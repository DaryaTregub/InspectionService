<?php

namespace App\Http\Controllers\api\v1_0;

use App\Http\Controllers\Controller;

use App\Http\Controllers\api\v1_0\SCDatainputController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MSSQL;
use PDO;
use App\Http\Controllers\Core;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\StorageEngine;
use Psy\Command\WhereamiCommand;
use ZipArchive;
use DateTime;
// Excel
use App\Imports\ExcelConverter;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class SCStatisticController extends Controller
{
	public static function ConvertObjectToArray($object)
	{//convert object to array

        $array=array_map(function($item){
            return (array) $item;
        }, $object);
		return $array;
	}

	public static function TopMistake($filter, $len=10)
	{//
		switch ($filter) {
			case 'department':
				$select = "test_department.name,";
				$from = ", test_department, test_servcheck, test_act";
				$where = "and test_order_mistake.order_id = test_servcheck.id and test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id";
				$groupby = "group by test_department.name";
				break;
			case 'filial':
				$select = "test_servcheck.mfc_name, ";
				$from = ", `test_servcheck`";
				$where = "and `test_order_mistake`.`order_id` = `test_servcheck`.`id`";
				$groupby = "group by test_servcheck.mfc_name";
				break;
			case 'service':
				$select = "test_servcheck.service_title, ";
				$from = ", `test_servcheck`";
				$where = "and `test_order_mistake`.`order_id` = `test_servcheck`.`id`";
				$groupby = "group by test_servcheck.service_title";
				break;
			case 'mistake':
				$select = "test_mistake.description, ";
				$from = ", `test_mistake`";
				$where = "and test_mistake.id = test_order_mistake.mistake_id";
				$groupby = "group by test_mistake.description";
				break;
			case 'employee':
				$select = "test_servcheck.user_display_name, ";
				$from = ", `test_servcheck`";
				$where = "and `test_order_mistake`.`order_id` = `test_servcheck`.`id`";
				$groupby = "group by test_servcheck.user_display_name";
				break;
		};
		//заготовка запроса
		$limit = " limit {$len}";
		$sql = "SELECT
					".$select."
					count(`test_order_mistake`.`mistake_id`) as cnt_mistake, sum(critical) as cnt_critical
				FROM
					`test_order_mistake`".$from."
				where
					1

					".$where."
				".$groupby."
				order by cnt_mistake desc".$limit;

		$res = DB::select($sql);

		//convert object to array
        $res=array_map(function($item){
            return (array) $item;
        }, $res);

		return $res;
	}

	public static function GetYear()
	{
		$sql = "SELECT distinct DATE_FORMAT(test_act.act_date, '%Y') as current_year FROM `test_act`";
		$res = DB::select($sql);
		return json_encode($res, JSON_UNESCAPED_UNICODE);
	}

	public static function BarChartMistake($year)
	{
		//$sql = "select DATE_FORMAT(test_act.act_date, '%M') as month , sum(case resolution when 2 then 1 else 0 end) resolution_2, sum(case resolution when 1 then 1 else 0 end) resolution_1, sum(case resolution when 0 then 1 else 0 end) resolution_0 from test_servcheck, test_act where test_servcheck.act_id = test_act.id group by month;";
		//TODO::вставить год и исправить подсчет критичных ошибок
		//$sql = "SELECT DATE_FORMAT(test_act.act_date, '%M') as month, sum(`test_order_mistake`.`critical`) as yesSC, (sum(case resolution when 2 then 1 else 0 end) - sum(`test_order_mistake`.`critical`)) as notSC, sum(case resolution when 1 then 1 else 0 end) as neysmotr, sum(case resolution when 0 then 1 else 0 end) as noRes, count(test_servcheck.id) as vsego FROM `test_order_mistake`, test_servcheck, test_act, test_department where 1 and test_order_mistake.order_id = test_servcheck.id and test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id  group by month;";

		$sql = "SELECT DATE_FORMAT(test_act.act_date, '%M') as month,
		(SELECT sum(`test_order_mistake`.`critical`) FROM `test_order_mistake`, test_servcheck, test_act, test_department where 1 and test_order_mistake.order_id = test_servcheck.id and test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id and test_servcheck.resolution = 2) as yesSC,
		(sum(case resolution when 2 then 1 else 0 end) - (SELECT sum(`test_order_mistake`.`critical`) FROM `test_order_mistake`, test_servcheck, test_act, test_department where 1 and test_order_mistake.order_id = test_servcheck.id and test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id and test_servcheck.resolution = 2)) as notSC,
		sum(case resolution when 1 then 1 else 0 end) as neysmotr,
		sum(case resolution when 0 then 1 else 0 end) as noRes,
		count(test_servcheck.id) as vsego
		FROM `test_order_mistake`, test_servcheck, test_act, test_department where 1 and test_order_mistake.order_id = test_servcheck.id and test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id  group by month;";

		//and DATE_FORMAT(test_act.act_date, '%Y') = '{$year}' DATE_FORMAT(test_act.act_date, '%Y') as current_year,

		$res = DB::select($sql);
		return self::ConvertObjectToArray($res);
	}

	public static function AllMistake($period_from, $period_to)
	{
		$period['from'] = date('Y-m-d', strtotime($period_from));
		$period['to'] = date('Y-m-d', strtotime($period_to));
		$sql = "
			SELECT distinct 'allmistake',
			/*усмотрена ошибка требуется служебная проверка*/
			(SELECT sum(`test_order_mistake`.`critical`) as resolution_2 FROM `test_order_mistake`, test_servcheck, test_act, test_department where 1 and test_order_mistake.order_id = test_servcheck.id and test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id and test_servcheck.resolution = 2 and test_act.act_date between '{$period['from']}' and '{$period['to']}') as yesSC,

			/*усмотрена ошибка НЕ требуется служебная проверка*/
			(select sum(case resolution when 2 then 1 else 0 end) resolution_2 from test_servcheck, test_act, test_department where
			test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id and test_act.act_date between '{$period['from']}' and '{$period['to']}') - (SELECT sum(`test_order_mistake`.`critical`) as resolution_2 FROM `test_order_mistake`, test_servcheck, test_act, test_department where 1 and test_order_mistake.order_id = test_servcheck.id and test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id and test_servcheck.resolution = 2 and test_act.act_date between '{$period['from']}' and '{$period['to']}') as notSC,

			/*ошибка НЕ усмотрена*/
			(select sum(case resolution when 1 then 1 else 0 end) resolution_2 from test_servcheck, test_act, test_department where
			test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id and test_act.act_date between '{$period['from']}' and '{$period['to']}') as neysmotr,

			/*резолюция не выставлена*/
			(select sum(case resolution when 0 then 1 else 0 end) resolution_2 from test_servcheck, test_act, test_department where
			test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id and test_act.act_date between '{$period['from']}' and '{$period['to']}') as noRes,

			/*всего ошибок*/
			(select count(test_servcheck.id) from test_servcheck, test_act, test_department where
			test_servcheck.act_id = test_act.id and test_act.department_id = test_department.id and test_act.act_date between '{$period['from']}' and '{$period['to']}') as vsego
			FROM `test_department`;
		";
		$res = DB::select($sql);
		$res = self::ConvertObjectToArray($res);
		return $res;
	}

	public static function TestSend($period, $data, $type)
    {
        			$result = SCDatainputController::PrepareStatisticDataToReport($period, $data, $type);

        			if ($result != false) {

                        $result=array_map(function($item){return (array) $item;}, $result);

                        $excel_headings_array = [
                            'Категория',
                            'Не усмотрено ошибок',
                            'Усмотрено, требуется СП',
                            'Усмотрено, не требуется СП',
                            'Ошибок без резолюции',
                            'Всего ошибок'
                        ];
                        $_POST['excel_headings_array'] = $excel_headings_array;
                        $_POST['excel_array'] = $result;

                        //имя файла отчета
                        $file_name = 'СервисПроверок_СтатистическаяИнформация';
                        //скачиваем документ xlsx с данными из запроса на компьютер
                        return Excel::download(new UsersExport(), $file_name.'.xlsx');
                    };
    }

	public function DataShow(Request $request)
    {
    	if ($request->type == 'top') {
    		//if (isset($request->filter) && $request->filter != '') {
    			$top['department'] = self::TopMistake('department');
    			$top['filial'] = self::TopMistake('filial');
    			$top['service'] = self::TopMistake('service');
    			$top['mistake'] = self::TopMistake('mistake');
    			$top['employee'] = self::TopMistake('employee');
    			//print("<pre>".print_r(self::TopMistake($request->filter),true)."</pre>");
    			return json_encode($top, JSON_UNESCAPED_UNICODE);
    		//};
    	};

    	if ($request->type == 'barchart') {
    		if (isset($request->year) && $request->year != '') {
    			return self::BarChartMistake($request->year);
    		};
    	};

    	if ($request->type == 'all_mistake') {
    		if (isset($request->period_from) && $request->period_from != '' && isset($request->period_to) && $request->period_to != '') {
    			return json_encode(self::AllMistake($request->period_from,$request->period_to), JSON_UNESCAPED_UNICODE);
    		};
    	};

    	if ($request->type == 'download_stat_report') {
            //проверим входящие параметры
            if (isset($request->period) && $request->period != '' && isset($request->report) && $request->report != '') {

                if (!empty($request->report_data)) {
                    $data['report_data'] = json_decode($request->report_data, true);//условия поиска
                    $type = $request->report;//тип отчета
                    //период за который делаем выборку
                    $period['from'] = date('Y-m-d', strtotime(substr($request->period, 0, 10)));
                    $period['to'] = date('Y-m-d', strtotime(substr($request->period, -10)));
                    $result = SCDatainputController::PrepareStatisticDataToReport($period, $data, $type);
        			if ($result != false) {
                        $result=array_map(function($item){return (array) $item;}, $result);
                        $excel_headings_array = [
                            'Категория',
                            'Не усмотрено ошибок',
                            'Усмотрено, требуется СП',
                            'Усмотрено, не требуется СП',
                            'Ошибок без резолюции',
                            'Всего ошибок'
                        ];
                        $_POST['excel_headings_array'] = $excel_headings_array;
                        $_POST['excel_array'] = $result;

                        //имя файла отчета
                        $file_name = 'СервисПроверок_СтатистическаяИнформация';
                        //скачиваем документ xlsx с данными из запроса на компьютер
                        return Excel::download(new UsersExport(), $file_name.'.xlsx');
                    };
                };

            };

        };

        if ($request->type == 'get_year') {
        	return self::GetYear();
        };

        if ($request->type == 'try') {

    	};

    }
}
