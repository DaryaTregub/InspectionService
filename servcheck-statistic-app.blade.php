<?php
/* Настройки текущей страницы --->  */ $title = 'Статистика сервиса проверок';
// $style = "header-and-content";
$role = 'sc_statistic'; // $style = 'only-content'; // $style = 'header-and-content';
/* Основная логика - не менять ---> */

use App\Http\Controllers\Core;

$user = Core::Init($role);
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
	<base href="" />
	<title>{{ $title }}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--begin::global(mandatory for all pages)-->
	<link rel="shortcut icon" href="m_assets/media/mfc-favicon.ico" />
	<link rel="stylesheet" href="m_assets/css/InterFont/Inter.css" />
	<link href="m_assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="m_assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::global-->
	<!--begin::cssCustom js by this page-->
	<!--end::cssCustom js by this page-->
	<style>
		.select2-container .select2-selection {
			max-height: 300px;
			overflow-y: auto;
		}	
		.aside {
            width: 0;
        }
	</style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed">
	<?php echo Core::GetThemeMode() . Core::Getloader(); ?>
	<!--begin::Main--><!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper--><?php echo Core::GetWrapper((isset($style) ? $style : 'full')); ?><!--<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">-->
			<?php echo Core::GetHeader((isset($style) ? $style : 'full')); ?>
			<!--begin::Content wrapper-->
			<div class="d-flex flex-column-fluid">
				<?php echo Core::GetMenu((isset($style) ? $style : 'full')); ?>
				<!--begin::Container-->
				<div class="d-flex flex-column flex-column-fluid container-fluid">
					<!--begin::Post-->
					<div class="content d-flex" id="kt_content">
						<div style="flex: 1 1 60%;">
							<h1 class="d-flex text-dark fw-bold my-1 fs-3">Статистика по сервису проверок</h1>
						</div>
						<ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
							<li class="nav-item w-10 me-2">
								<a class="nav-link w-100 active btn btn-flex btn-active-light-success" data-bs-toggle="tab" href="#kt_tab_pane_1" id="report_tab">
									<span class="svg-icon fs-2"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-07-10-101904/core/html/src/media/icons/duotune/files/fil002.svg-->
										<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="currentColor" />
												<path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon--></span>
									<span class="d-flex flex-column align-items-start">
										<span class="fs-4 fw-bold">Таблица</span>
									</span>
								</a>
							</li>
							<li class="nav-item w-10 me-4">
								<a class="nav-link w-100 btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_tab_pane_2" id="diagramm_tab">
									<span class="svg-icon fs-2"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-07-10-101904/core/html/src/media/icons/duotune/general/gen032.svg-->
										<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
												<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
												<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
												<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon--></span>
									<span class="d-flex flex-column align-items-start">
										<span class="fs-4 fw-bold">Диаграммы</span>
									</span>
								</a>
							</li>
							<li class="nav-item w-10 me-0">
								<a class="nav-link w-100 btn btn-flex btn-active-light-warning" data-bs-toggle="tab" href="#kt_tab_pane_3" id="tops_tab">
									<span class="svg-icon fs-2"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-07-10-101904/core/html/src/media/icons/duotune/general/gen029.svg-->
										<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon--></span>
									<span class="d-flex flex-column align-items-start">
										<span class="fs-4 fw-bold">Топ-10</span>
									</span>
								</a>
							</li>
						</ul>
						<!-- <div class="input-group mb-5">
							
								<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
							</div> -->

						<!--end::Card-->

					</div><!--end::Post-->



					<div class="tab-content col-xl-12" id="myTabContent">
						<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
							<div class="row g-5 g-xl-8 mb-9">
								<div class="col-3">
									<div class="donat-container">
										<div class="card card-flush mb-5">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Currency-->

														<!--end::Currency-->

														<!--begin::Amount-->
														<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"> Всего ошибок: <span id="vsego-title"></span></span>
														<!--end::Amount-->

														<!--begin::Badge-->

														<!--end::Badge-->
													</div>
													<!--end::Info-->

													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-semibold fs-6">всего по письмам органов</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Chart-->

											<div class="card-body pt-0">
												<div id="kt_card_widget_4_chart" data-kt-size="70" data-kt-line="11">

												</div>
											</div>
											<!--begin::Card body-->

											<!--end::Card body-->
										</div>
									</div>

								</div>
								<div class="col-xl-9">
									<div class="card mb-xl-8 text-center">
										<div class="card-header ">

											<!--begin::Card title-->
											<div class="card-title flex-column">
												<h3 class="fw-bold">Фильтры</h3>
											</div>


											<!--end::Card title-->
										</div>
										<!--begin::Card body-->
										<div class="card-body">
											<div class="px-7 py-5">
												<div class="d-flex">
													<div class=" text-start w-50">
														<label for="" class="form-label">Выберите период:</label>
														<div class="mb-0 me-5">
															<input class="form-control form-control-solid" placeholder="Pick date rage" id="kt_daterangepicker_4" />
														</div>
													</div>
													<div class="text-start w-50">
														<label for="" class="form-label">Количество ошибок по:</label>
														<select id="report_select" class="form-select" data-control="select2" data-placeholder="Выберите фильтр">
															<option></option>
															<option value="departments">По ведомству</option>
															<option value="filials">По филиалу МФЦ</option>
															<option value="services">По услуге</option>
															<option value="users">По сотруднику</option>
															<option value="mistakes">По виду ошибки</option>
														</select>
													</div>
												</div>
												<!--begin::Input group-->
												<div class="d-flex">

													<div id="departments_container" class="text-start report_select_container mt-10 w-100" style="display: none;">
														<label for="departments_select" class="form-label select-label">Oрган власти</label>
														<select id="departments_select" class="form-select type_report-select" data-control="select2" data-placeholder="Выберите орган власти" data-allow-clear="true" multiple="multiple">
														</select>

													</div>
													<div id="filials_container" class="text-start report_select_container mt-10 w-100" style="display: none;">
														<label for="filials_select" class="form-label select-label">Филиал МФЦ</label>
														<select id="filials_select" class="form-select type_report-select" data-control="select2" data-placeholder="Выберите филиал" data-allow-clear="true" multiple="multiple">
														</select>
													</div>
													<div id="services_container" class="text-start report_select_container mt-10 w-100" style="display: none;">
														<label for="services_select" class="form-label select-label">Услуга</label>
														<select id="services_select" class="form-select type_report-select" data-control="select2" data-placeholder="Выберите услугу" data-allow-clear="true" multiple="multiple">
														</select>
													</div>
													<div id="users_container" class="text-start report_select_container mt-10 w-100" style="display: none;">
														<label for="users_select" class="form-label select-label">Сотрудник</label>
														<select id="users_select" class="form-select type_report-select" data-control="select2" data-placeholder="Выберите сотрудника" data-allow-clear="true" multiple="multiple">
														</select>
													</div>
													<div id="mistakes_categories_container" class="mt-10 text-start report_select_container w-100" style="display: none;">
														<label for="mistakes_categories_select" class="form-label select-label">Категория ошибок</label>
														<select id="mistakes_categories_select" class="form-select type_report-select" data-control="select2" data-placeholder="Выберите сотрудника" data-allow-clear="true" multiple="multiple">
														</select>
													</div>
													<div id="mistakes_container" class="text-start mt-10 report_select_container w-100" style="display: none;">
														<label for="mistakes_select" class="form-label select-label">Вид ошибки</label>
														<select id="mistakes_select" class="form-select type_report-select" data-control="select2" data-placeholder="Выберите вид ошибки" data-allow-clear="true" multiple="multiple">
														</select>
													</div>
													<div id="all_check_container" class="form-check text-start mt-10 ms-5 mt-auto mb-3" style="display: none; width:10%;">
														<input id="all_check" class="form-check-input me-3" type="checkbox" value="" id="flexCheckDefault" />
														<label id="all_check_label" class="form-check-label" for="flexCheckDefault">
															Выбрать все
														</label>
													</div>
												</div>
												<!--end::Input group-->

												<!--begin::Actions-->
											</div>



											<!--begin::Heading-->

										</div>
										<div class="card-footer">
											<div class="card-toolbar">
												<div class="menu-item px-3 d-flex  justify-content-between">
													<!-- <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Фильтры</div> -->
													<button id="reset_filters" type="button" class="btn btn-light-primary w-50 me-5" data-kt-menu-placement="bottom-start" data-kt-menu-offset="30px, 30px">
														<i class="ki-duotone ki-filter fs-2"></i> Сбросить

													</button>
													<button id="generate_report_btn" disabled type="submit" class="btn btn-primary w-50" data-kt-menu-dismiss="true" data-kt-docs-table-filter="filter">
														<font style="vertical-align: inherit;">
															<font style="vertical-align: inherit;">Сформировать</font>
														</font>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xl-12">
									<!--begin::Card-->
									<div class="card" id="report_table_card" style="display: none;">
										<div class="card-header">
											<h3 class="card-title"></h3>
											<div class="card-toolbar">
												<button type="button" id="generate-report_table" class="btn btn-success">Скачать в exel</button>
											</div>
										</div>
										<!--begin::Card body-->
										<div class="card-body">
											<!--begin::Heading-->
											<div class="table-responsive text-center">
												<div id="general-report_table"></div>
												<table class="table">
													<thead id="report_table_thead" style="display: none;">
														<tr class="fw-bold fs-6 text-gray-800">
															<th id="report_table_type_title" style="display: none;"></th>
															<th>Не усмотрено ошибок</th>
															<th>Усмотрено, требуется служебная проверка</th>
															<th>Усмотрено, не требуется служебная проверка</th>
															<th>Ошибок по которым не выставлена резолюция</th>
															<th>Всего ошибок</th>

														</tr>
													</thead>
													<tbody id="report_table">
													</tbody>
													<tfoot id="report_table_footer" class="fw-bold fs-6 text-gray-800 " style="border-top:1px solid var(--kt-card-border-color);">

													</tfoot>
												</table>
											</div>

											<!--end::Heading-->
										</div>

										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" id="diagramms">
							<div class="row g-5 g-xl-8 mb-9">
								<div class="col-xl-3 d-none">
									<div class="card mb-5 d-none">

										<div class="card-body">

											<label class="form-label">
												Год
											</label>
											<select class="form-select mb-3" data-control="select2" data-placeholder="Выберите год" id="year_select">
											</select>
											<a class="btn btn-primary w-100" id="load-diagramms_btn">Сформировать</a>
										</div>

									</div>
									<div class="donat-container d-none">
										<div class="card card-flush mb-5">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Currency-->

														<!--end::Currency-->

														<!--begin::Amount-->
														<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"> <span id="vsego-title"></span> ошибки</span>
														<!--end::Amount-->

														<!--begin::Badge-->

														<!--end::Badge-->
													</div>
													<!--end::Info-->

													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-semibold fs-6">всего по письмам органов</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Chart-->

											<div class="card-body">
												<div id="kt_card_widget_4_chart" data-kt-size="70" data-kt-line="11">

												</div>
											</div>
											<!--begin::Card body-->

											<!--end::Card body-->
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="diagramms_container">
										<div class="card card-flush h-lg-100 mb-5">
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Currency-->

														<!--end::Currency-->

														<!--begin::Amount-->
														<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">За 1 год</span>
														<!--end::Amount-->

														<!--begin::Badge-->

														<!--end::Badge-->
													</div>
													<!--end::Info-->

													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-semibold fs-6">период</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<div class="card-body pb-0 pt-0">
												<div id="barchart_container">

												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="diagramms_container">
										<div class="card card-flush h-lg-100 mb-5">
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Currency-->

														<!--end::Currency-->

														<!--begin::Amount-->
														<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">За 1 год</span>
														<!--end::Amount-->

														<!--begin::Badge-->

														<!--end::Badge-->
													</div>
													<!--end::Info-->

													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-semibold fs-6">период</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<div class="card-body pb-0 pt-0">
												<div id="linechart_container">

												</div>

											</div>
										</div>
									</div>
								</div>


							</div>
						</div>
						<div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
							<div class="row g-5 g-xl-8 mb-9" id="tops-row"></div>

						</div>
					</div>

				</div>

			</div>
		</div><!--end::Container-->
	</div><!--end::Content wrapper-->
	</div><!--end::Wrapper-->
	</div><!--end::Page-->
	</div><!--end::Root--><!--end::Main-->
	<?php echo Core::GetScrolltop() ?>
	<!--begin::Javascript-->
	<script>
		var hostUrl = "m_assets/";
	</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="m_assets/plugins/global/plugins.bundle.js"></script>
	<script src="m_assets/js/scripts.bundle.js"></script>
	<script src="m_assets/js/service.js"></script>


	<script src="m_assets/js/service_custom/clientServer.js"></script>
	<script src="m_assets/js/service_custom/constructorUrl.js"></script>
	<script src="m_assets/js/service_custom/template.js"></script>
	<script src="m_assets/js/service_custom/sweetAlerts.js"></script>
	<script src="m_assets/js/service_custom/menuClose.js"></script>

	<script>
		(() => {
			var start = moment().subtract(29, "days");
			var end = moment();

			function cb(start, end) {
				$("#kt_daterangepicker_4").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
			};

			$("#kt_daterangepicker_4").daterangepicker({
				startDate: start,
				endDate: end,
				ranges: {
					"Сегодня": [moment(), moment()],
					"Вчера": [moment().subtract(1, "days"), moment().subtract(1, "days")],
					"Последние 7 дней": [moment().subtract(6, "days"), moment()],
					"Последние 30 дней": [moment().subtract(29, "days"), moment()],
					"За текущий месяц": [moment().startOf("month"), moment().endOf("month")],
					"За прошлый месяц": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
				},
				locale: {
					"format": "DD.MM.YYYY",
					"separator": "-",
					"applyLabel": "Применить",
					"cancelLabel": "Закрыть",
					"fromLabel": "From",
					"toLabel": "To",
					"customRangeLabel": "Custom",
					"daysOfWeek": [
						"Вс",
						"Пн",
						"Вт",
						"Ср",
						"Чт",
						"Пт",
						"Сб"
					],
					"monthNames": [
						"Январь",
						"Февраль",
						"Март",
						"Апрель",
						"Май",
						"Июнь",
						"Июль",
						"Август",
						"Сентябрь",
						"Октябрь",
						"Ноябрь",
						"Декабрь"
					],
					"firstDay": 1
				}

			}, cb);

			cb(start, end);
			document.querySelectorAll('.daterangepicker .ranges li')[6].textContent = 'Другой период'
		})();

		$("#kt_daterangepicker_1").daterangepicker();

		class ServCheckStatisticApp {
			constructor() {
				this.url = 'api/v1_0/ServCheck';
				this.statisticurl = 'api/v1_0/SCStatistic';
				this.responce = new ClientServer();
				this.convertUrl = new ConverterUrl();
				this.statisticPageContent = new StatisticPageContent();
				this.filters = null;
				this.listYears = null;

			};

			createServcheckStatisticApp() {
				this.loadGeneralReport();
				this.getfiltersInfo();
				this.statisticPageContent.daterangepickerActive();
				this.loadTabsContent();
				this.downloadGenerateReportTable();
				this.statisticPageContent.closeOpenMenu();
			};


			async getfiltersInfo() {
				const params = {
					type: 'get_statistic_filters_info'
				};
				const url = this.convertUrl.pageUrl(this.url, params);
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				console.log(result);
				this.statisticPageContent.setFilters = result;
				this.statisticPageContent.addDepartmentsList();
				this.statisticPageContent.addFilialsList();
				this.statisticPageContent.addServicesList();
				this.statisticPageContent.addUsersList();
				this.statisticPageContent.selectReportType();
				this.statisticPageContent.multiplaySelectSearchActive();
				this.statisticPageContent.selectAllCheck();
				this.statisticPageContent.addMistakeList();
				$("#mistakes_select").select2({
					tags: true,
					dropdownParent: $("#mistakes_container")
				});
				this.resetFilters();
				this.generateReport();
				// this.formReportBtnActive();
			};

			// formReportBtnActive() {
			// 	$('#report_select').on('change', () => {
			// 		if ($('#report_select').val()) {
			// 			document.getElementById('generate_report_btn').removeAttribute('disabled');
			// 			document.querySelectorAll('.type_report-select').forEach((el) => {
			// 				el.addEventListener('change', () => {
			// 					console.log(el)
			// 				})
			// 				// if(el.style.display !== 'none') {

			// 				// }
			// 			})
			// 		};
			// 		console.log($('#report_select').val());
			// 	})

			// }

			downloadGenerateReportTable() {
				document.getElementById('generate-report_table').addEventListener('click', async () => {
					const params = {
						type: 'download_stat_report',
						report: $('#report_select').val(),
						period: document.getElementById('kt_daterangepicker_4').value,
						report_data: JSON.stringify($(`#${$('#report_select').val()+'_select'}`).val())
					};
					const url = this.convertUrl.pageUrl(this.statisticurl, params);
					console.log(url)
					window.location.href = url;




				});
			};


			resetFilters() {
				document.getElementById('reset_filters').addEventListener('click', () => {
					this.statisticPageContent.cleaneReportFilters();
					// this.loadGeneralReport();
				});
			};

			generateReport() {
				document.getElementById('generate_report_btn').addEventListener('click', async () => {
					const params = {
						type: 'generate_report',
						report: $('#report_select').val(),
						period: document.getElementById('kt_daterangepicker_4').value
					};

					const data = {
						report_data: JSON.stringify($(`#${$('#report_select').val()+'_select'}`).val())
					}

					const url = this.convertUrl.pageUrl(this.url, params);
					this.responce.setUrl = url;
					const result = await this.responce.postData(data);
					// const check = JSON.parse(result)

					// if (!JSON.parse(result).type == "error") {
					console.log(result);
					this.statisticPageContent.setReport = result;
					this.statisticPageContent.addReportTable();
					let dataDoughnut = {
						neysmotr: 0,
						noRes: 0,
						notSC: 0,
						vsego: 0,
						yesSC: 0
					}
					if (result.length > 0) {
						result.forEach((el) => {
							dataDoughnut.neysmotr += Number(el.neysmotr);
							dataDoughnut.noRes += Number(el.noRes);
							dataDoughnut.notSC += Number(el.notSC);
							dataDoughnut.vsego += Number(el.vsego);
							dataDoughnut.yesSC += Number(el.yesSC);
						})
					}
					let dataDoughnutArr = [];
					Object.keys(dataDoughnut).forEach((el) => {
						dataDoughnutArr.push(dataDoughnut[el]);
					});
					// console.log(dataDoughnut)

					this.statisticPageContent.addDoughnut(dataDoughnut)

					// } else {
					// this.statisticPageContent.alerts.setText = result.text + '!';
					// this.statisticPageContent.alerts.sweetAlertError();
					// };
				});
			};

			async getListYears() {
				const params = {
					type: 'get_year'
				};
				const url = this.convertUrl.pageUrl(this.statisticurl, params);
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				this.listYears = result;
				this.statisticPageContent.setListYearInfo = this.listYears;
				this.statisticPageContent.addListYear();
			};

			async loadDiagrammsContent(year) {
				const params = {
					type: 'barchart',
					year: year
				};
				const url = this.convertUrl.pageUrl(this.statisticurl, params);
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				if (result.type !== "error") {
					this.diagrammsDataDoughnut = result;
					console.log(result)
					this.statisticPageContent.setDiagrammsInfo = this.diagrammsDataDoughnut;
					this.statisticPageContent.addBarchart();
					this.statisticPageContent.addlineChart();
				} else {
					this.StatisticPageContent.alerts.setText = result.text + '!';
					this.StatisticPageContent.alerts.sweetAlertError();
				};

				// barchart
				// http://127.0.0.1:8000/api/v1_0/SCStatistic?type=barchart
			};
			async loadTops() {
				////http://127.0.0.1:8000/api/v1_0/SCStatistic?type=query&filter=department
				const params = {
					type: 'top'
				};
				const url = this.convertUrl.pageUrl(this.statisticurl, params);
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				this.statisticPageContent.setTops = result;
				this.statisticPageContent.addTops();
			}

			loadTabsContent() {
				const tabs = document.querySelectorAll('a[data-bs-toggle="tab"]');
				tabs.forEach((el) => {
					el.addEventListener('shown.bs.tab', async (event) => {
						if (el.id == 'report_tab') {
							console.log('отчет');
						} else if (el.id == 'diagramm_tab') {
							await this.getListYears();
							const year = this.listYears[this.listYears.length - 1].current_year;
							await this.loadDiagrammsContent(year);
							this.loadDiagrammsBtnClick();
						} else if (el.id == 'tops_tab') {
							await this.loadTops();
							console.log('top');
						};
					});
				});
			};

			loadDiagrammsBtnClick() {
				document.getElementById('load-diagramms_btn').addEventListener('click', async (e) => {
					e.preventDefault();
					if ($('#year_select').val()) {
						await this.loadDiagrammsContent($('#year_select').val());
					};
				});
			};

			async loadGeneralReport() {
				const period = document.getElementById('kt_daterangepicker_4').value;
				const params = {
					type: 'all_mistake',
					period_from: period.substring(0, 10),
					period_to: period.substring(11, period.length)
				};
				const url = this.convertUrl.pageUrl(this.statisticurl, params);
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				console.log(result);
				if (result.type !== "error") {
					console.log(result)
					this.statisticPageContent.addDoughnut(result[0])

				} else {
					this.StatisticPageContent.alerts.setText = result.text + '!';
					this.StatisticPageContent.alerts.sweetAlertError();
				};
				// http://127.0.0.1:8000/api/v1_0/SCStatistic?type=all_mistake&period_from=01.01.2000&period_to=01.01.2024 -- 
			};



		};

		class StatisticPageContent {
			constructor() {
				this.template = new Template();
				this.alerts = new SweetAlerts();
				this.filtersInfo = null;
				this.reportInfo = null;
				this.diagrammsInfo = null;
				this.generalReportInfo = null;
				this.primaryColor = KTUtil.getCssVariableValue('--kt-primary');
				this.dangerColor = KTUtil.getCssVariableValue('--kt-danger');
				this.successColor = KTUtil.getCssVariableValue('--kt-success');
				this.warningColor = KTUtil.getCssVariableValue('--kt-warning');
				this.infoColor = KTUtil.getCssVariableValue('--kt-info');
				this.fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');
				this.topsInfo = null;
				this.listYearInfo = null;
				this.topsHeaders = ['по ведомствам', 'по филиалам', 'по услугам', 'по ошибкам', 'по сотрудникам'];
				this.month = {
					January: 'Январь',
					February: 'Февраль',
					March: 'Март',
					April: 'Апрель',
					May: 'Май',
					June: 'Июнь',
					July: 'Июль',
					August: 'Август',
					September: 'Сентябрь',
					October: 'Октябрь',
					November: 'Ноябрь',
					December: 'Декабрь'
				};
				this.closeMenu = new Menu();
			};

			/**
			 * @param {any} value
			 */
			set setFilters(value) {
				this.filtersInfo = value;
			};

			/**
			 * @param {any} value
			 */
			set setReport(value) {
				this.reportInfo = value;
			};

			/**
			 * @param {any} value
			 */
			set setDiagrammsInfo(value) {
				this.diagrammsInfo = value;
			};


			/**
			 * @param {any} value
			 */
			set setGeneralReportInfo(value) {
				this.generalReportInfo = value;
			};

			/**
			 * @param {any} value
			 */
			set setTops(value) {
				this.topsInfo = value;
			};

			/**
			 * @param {any} value
			 */
			set setListYearInfo(value) {
				this.listYearInfo = value;
			};

			addListYear() {
				this.listYearInfo.forEach((el) => {
					const option = this.createOption(el.current_year, el.current_year);
					document.getElementById('year_select').add(option);
				});
			}

			closeOpenMenu() {
				this.closeMenu.setTime = 1;
				this.closeMenu.createMenu();
			};

			addBarchart() {
				const container = document.getElementById('barchart_container');
				container.innerHTML = '';
				const item = this.createBarchart();
				container.append(item);
				this.barchardAddContent();

			};

			createBarchart() {
				const itemInitial = `<div id="barchart_initial" data-kt-size="70" data-kt-line="11">
														<span></span><canvas id="kt_chartjs_2" class="mh-400px"></canvas>
													</div>`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			addlineChart() {
				const container = document.getElementById('linechart_container');
				container.innerHTML = '';
				const item = this.createlineChart();
				container.append(item);
				this.lineChartAddContent();
			};

			createlineChart() {
				const itemInitial = `<div id="lineChart_initial" data-kt-size="70" data-kt-line="11">
														<span></span><canvas id="kt_chartjs_gr" class="mh-400px"></canvas>`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;

			}

			lineChartAddContent() {
				var ctx = document.getElementById('kt_chartjs_gr');
				console.log(this.diagrammsInfo)
				const labels = [];
				const data1 = [];
				const data2 = [];
				const data3 = [];
				const data4 = [];
				this.diagrammsInfo.forEach((el) => {
					labels.push(this.month[el.month]);
					data1.push(Number(el.yesSC));
					data2.push(Number(el.notSC));
					data3.push(Number(el.neysmotr));
					data4.push(Number(el.noRes))
				});
				const data = {
					labels: labels,
					datasets: [{
							label: 'Усмотрена ошибка, требуется служебная проверка ',
							borderColor: [
								this.dangerColor,
							],
							data: data1,
						}, {
							label: 'Усмотрена ошибка, не требуется служебная проверка ',
							borderColor: [
								this.warningColor,
							],
							data: data2,
						}, {
							label: 'Ошибка не усмотрена',
							borderColor: [
								this.successColor
							],
							data: data3,
						},
						{
							label: 'Не выставлена резолюция',
							borderColor: [
								this.infoColor
							],
							data: data4,
						},
					]
				};

				// Chart config
				const config = {
					type: 'line',
					data: data,
					options: {
						plugins: {
							title: {
								display: false,
							}
						},
						responsive: true,
					},
					defaults: {
						global: {
							defaultFont: this.fontFamily
						}
					}
				};

				// Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
				var myChart = new Chart(ctx, config);
			}

			barchardAddContent() {
				console.log(this.diagrammsInfo)
				const labels = [];
				const data1 = [];
				const data2 = [];
				const data3 = [];
				const data4 = [];
				this.diagrammsInfo.forEach((el) => {
					labels.push(this.month[el.month]);
					data1.push(Number(el.yesSC));
					data2.push(Number(el.notSC));
					data3.push(Number(el.neysmotr));
					data4.push(Number(el.noRes))
				});
				const cgtx = document.getElementById('kt_chartjs_2');
				// TODO распределить правильно показатели диаграммы

				// Chart data
				const cgxdata = {
					labels: labels,
					datasets: [{
							label: 'Усмотрена ошибка, требуется служебная проверка ',
							backgroundColor: [
								this.dangerColor,
							],
							data: data1,
						}, {
							label: 'Усмотрена ошибка, не требуется служебная проверка ',
							backgroundColor: [
								this.warningColor,
							],
							data: data2,
						}, {
							label: 'Ошибка не усмотрена',
							backgroundColor: [
								this.successColor
							],
							data: data3,
						},
						{
							label: 'Не выставлена резолюция',
							backgroundColor: [
								this.infoColor
							],
							data: data4,
						},
					]
				};

				// Chart config
				const cgxconfig = {
					type: 'bar',
					data: cgxdata,
					options: {
						plugins: {
							title: {
								display: false,
							},
							// legend: {
							// 	// display: false,
							// 	labels: {
							// 		color: 'rgb(255, 99, 132)'
							// 	},
							// }
						},
						responsive: true,
					},
					defaults: {
						global: {
							defaultFont: this.fontFamily
						}
					}
				};
				var myChartcgx = new Chart(cgtx, cgxconfig);
			};


			addTops() {
				const container = document.getElementById('tops-row');
				container.innerHTML = '';
				const mass = Object.keys(this.topsInfo);
				const titles = this.topsHeaders;
				[mass[2], mass[4]] = [mass[4], mass[2]];
				[titles[2], titles[4]] = [titles[4], titles[2]];
				mass.forEach((el, index) => {
					let content = '';
					let maxNum = Object.values(this.topsInfo[el][0])[1];
					console.log(maxNum)
					this.topsInfo[el].forEach((item) => {
						const width = Math.floor((Object.values(item)[1] * 166) / maxNum);
						const itemContent = this.createTopItemContent(Object.values(item)[0], Object.values(item)[1], width);
						content += itemContent;
					});
					const item = this.createTopsCard(titles[index], content);
					container.append(item);
				});
			};

			createTopsCard(name, content) {
				const itemInitial = `<div class="col-4 ">
								<div class="card card-flush h-xl-100">
									<!--begin::Header-->
									<div class="card-header pt-5">
										<!--begin::Title-->
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bold text-gray-800">Топ-10 ${name}</span>

											<span class="text-gray-400 pt-2 fw-semibold fs-6 type-top-header">количество ошибок</span>
										</h3>
										<!--end::Title-->

										<!--begin::Toolbar-->
										<!-- <div class="card-toolbar">
										<a href="#" class="btn btn-sm btn-light">PDF Report</a>
									</div> -->
										<!--end::Toolbar-->
									</div>
									<!--end::Header-->

									<!--begin::Body-->
									<div class="card-body d-flex flex-column py-3">
									<div class="m-0"></div>
									<div class="table-responsive mb-n2">
											<!--begin::Table-->
											<table class="table table-row-dashed gs-0 gy-4">
												<!--begin::Table head-->
												<thead>
													<tr class="fs-7 fw-bold border-0 text-gray-400">
														<th class="min-w-300px">Название</th>
														<th class="min-w-100px">Количество</th>
													</tr>
												</thead>
												<tbody>
										${content}
										</tbody>
										</table>
										</div>
										<!--end::Table container-->
									</div>
									<!--end::Body-->
								</div>
							</div>`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			createTopItemContent(name, quantity, width) {
				const item = `<tr>
														<td>
															<a class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">${name}</a>
														</td>
														<td class="d-flex align-items-center border-0">
															<span class="fw-bold text-gray-800 fs-6 me-3">${quantity}</span>

															<div class="progress rounded-start-0">
																<div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: ${width}px" aria-valuenow="${width}" aria-valuemin="0" aria-valuemax="${width}px"></div>
															</div>
														</td>
													</tr>`;
				return item;

			}


			createGeneralReportTable(el) {
				const itemInitial = `
				<tbody>
				<tr>
														<td>
															<a class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Не усмотрено ошибок</a>
														</td>
														<td class="d-flex align-items-center border-0">
															<span class="fw-bold text-gray-800 fs-6 me-3">${el.neysmotr}</span>

															<!-- <div class="progress rounded-start-0">
																<div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 166px" aria-valuenow="166" aria-valuemin="0" aria-valuemax="166px"></div>
															</div> -->
														</td>
													</tr>
													<tr>
														<td>
															<a class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Усмотрено, требуется служебная проверка</a>
														</td>
														<td class="d-flex align-items-center border-0">
															<span class="fw-bold text-gray-800 fs-6 me-3">${el.yesSC}</span>

															<!-- <div class="progress rounded-start-0">
																<div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 166px" aria-valuenow="166" aria-valuemin="0" aria-valuemax="166px"></div>
															</div> -->
														</td>
													</tr>
													<tr>
														<td>
															<a class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Усмотрено, не требуется служебная проверка	</a>
														</td>
														<td class="d-flex align-items-center border-0">
															<span class="fw-bold text-gray-800 fs-6 me-3">${el.notSC}</span>

															<!-- <div class="progress rounded-start-0">
																<div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 166px" aria-valuenow="166" aria-valuemin="0" aria-valuemax="166px"></div>
															</div> -->
														</td>
													</tr>
													<tr>
														<td>
															<a class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Ошибок по которым не выставлена резолюция	</a>
														</td>
														<td class="d-flex align-items-center border-0">
															<span class="fw-bold text-gray-800 fs-6 me-3">${el.noRes}</span>

															<!-- <div class="progress rounded-start-0">
																<div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 166px" aria-valuenow="166" aria-valuemin="0" aria-valuemax="166px"></div>
															</div> -->
														</td>
													</tr>
														</tbody>
													`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			}

			createDiagrammsContent() {

			};

			daterangepickerActive() {
				var start = moment().subtract(29, "days");
				var end = moment();

				function cb(start, end) {
					$("#kt_daterangepicker_4").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
				};

				$("#kt_daterangepicker_4").daterangepicker({
					startDate: start,
					endDate: end,
					ranges: {
						"Сегодня": [moment(), moment()],
						"Вчера": [moment().subtract(1, "days"), moment().subtract(1, "days")],
						"Последние 7 дней": [moment().subtract(6, "days"), moment()],
						"Последние 30 дней": [moment().subtract(29, "days"), moment()],
						"За текущий месяц": [moment().startOf("month"), moment().endOf("month")],
						"За прошлый месяц": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
					},
					locale: {
						"format": "DD.MM.YYYY",
						"separator": "-",
						"applyLabel": "Применить",
						"cancelLabel": "Закрыть",
						"fromLabel": "From",
						"toLabel": "To",
						"customRangeLabel": "Custom",
						"daysOfWeek": [
							"Вс",
							"Пн",
							"Вт",
							"Ср",
							"Чт",
							"Пт",
							"Сб"
						],
						"monthNames": [
							"Январь",
							"Февраль",
							"Март",
							"Апрель",
							"Май",
							"Июнь",
							"Июль",
							"Август",
							"Сентябрь",
							"Октябрь",
							"Ноябрь",
							"Декабрь"
						],
						"firstDay": 1
					}

				}, cb);

				cb(start, end);
				document.querySelectorAll('.daterangepicker .ranges li')[6].textContent = 'Другой период'
			};

			createOption(name, id) {
				const optionInitial = `
                <option value="${id}">${name}</option>`;
				this.template.setTemplate = optionInitial;
				const optionTemplate = this.template.createFromTemplate();
				return optionTemplate;
			};

			addDepartmentsList() {
				const container = document.getElementById('departments_select');
				const list = JSON.parse(this.filtersInfo.departments);
				list.forEach((el) => {
					const item = this.createOption(el.name, el.id);
					container.append(item);
				});
			};

			addFilialsList() {
				const container = document.getElementById('filials_select');
				const list = JSON.parse(this.filtersInfo.filials);
				list.forEach((el) => {
					const item = this.createOption(el.mfc_name, el.mfc_id);
					container.append(item);
				});
			};

			addUsersList() {
				const container = document.getElementById('users_select');
				const list = JSON.parse(this.filtersInfo.users);
				list.forEach((el) => {
					const item = this.createOption(el.user_display_name, el.cpgu_user);
					container.append(item);
				});
			};

			addServicesList() {
				const container = document.getElementById('services_select');
				const list = JSON.parse(this.filtersInfo.services);
				list.forEach((el) => {
					const item = this.createOption(el.service_title, el.service_eid);
					container.append(item);
				});
			};

			addMistakeList() {
				const container = document.getElementById('mistakes_select');
				const list = JSON.parse(this.filtersInfo.mistakes);
				list.forEach((el) => {
					const item = this.createOption(el.description, el.id);
					container.append(item);
				});
			};

			selectReportType() {
				$('#report_select').on('select2:select', () => {
					console.log($('#report_select').val())
					document.querySelectorAll('.report_select_container').forEach((el) => {
						el.style.display = 'none';
					});
					$('.type_report-select').val(null).trigger('change');
					$(`#${$('#report_select').val()+'_container'}`).show();
					$(`#${$('#report_select').val()+'_select'}`).on('change', () => {
						if ($(`#${$('#report_select').val()+'_select'}`).val().length > 0) {
							document.getElementById('generate_report_btn').removeAttribute('disabled');
						} else {
							document.getElementById('generate_report_btn').setAttribute('disabled', 'disabled');
						};
					});
					$('#all_check_container').show();
					if (document.getElementById('all_check').checked) {
						console.log('checked');
						$('#all_check').prop('checked', false);
					};
				});
			};

			cleaneReportFilters() {
				document.querySelectorAll('.report_select_container').forEach((el) => {
					el.style.display = 'none';
				});
				$('#report_select').val(null).trigger('change');
				$('.type_report-select').val(null).trigger('change');
				$(`#${$('#report_select').val()+'_container'}`).hide();
				$('#all_check_container').hide();
				if (document.getElementById('all_check').checked) {
					console.log('checked')
					$('#all_check').prop('checked', false);
				};
			};


			multiplaySelectSearchActive() {
				const Utils = $.fn.select2.amd.require('select2/utils');
				const Dropdown = $.fn.select2.amd.require('select2/dropdown');
				const DropdownSearch = $.fn.select2.amd.require('select2/dropdown/search');
				const CloseOnSelect = $.fn.select2.amd.require('select2/dropdown/closeOnSelect');
				const AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');
				const dropdownAdapter = Utils.Decorate(Utils.Decorate(Utils.Decorate(Dropdown, DropdownSearch), CloseOnSelect), AttachBody);
				$('#filials_select').select2({
					dropdownAdapter: dropdownAdapter,
					tags: true,
				});
				$('#departments_select').select2({
					dropdownAdapter: dropdownAdapter,
					tags: true,
				});
				$('#services_select').select2({
					dropdownAdapter: dropdownAdapter,
					tags: true,
				});
				$('#users_select').select2({
					dropdownAdapter: dropdownAdapter,
					tags: true,
				});
			};

			selectAllCheck() {
				document.getElementById('all_check').addEventListener('change', (el) => {
					if (el.target.checked) {
						$(`#${$('#report_select').val()+'_select'}`).select2('destroy').find('option').prop('selected', 'selected').end().select2();
						document.getElementById('generate_report_btn').removeAttribute('disabled');
					} else {
						$(`#${$('#report_select').val()+'_select'}`).select2('destroy').find('option').prop('selected', false).end().select2();
						document.getElementById('generate_report_btn').setAttribute('disabled', 'disabled');
					};
				});
			};

			addReportTable() {
				const container = document.getElementById('report_table');
				const footerContainer = document.getElementById('report_table_footer');
				let all = {
					name: 'Всего',
					neysmotr: 0,
					noRes: 0,
					notSC: 0,
					vsego: 0,
					yesSC: 0
				}
				document.getElementById('report_table_thead').style.display = "none";
				container.innerHTML = '';
				footerContainer.innerHTML = '';
				this.reportInfo.forEach((el) => {
					console.log(el);
					Object.keys(el).forEach((it) => {
						if (!el[it]) {
							el[it] = 0;
						};
					});

					all.neysmotr += Number(el.neysmotr);
					all.noRes += Number(el.noRes)
					all.notSC += Number(el.notSC)
					all.vsego += Number(el.vsego)
					all.yesSC += Number(el.yesSC)

					const item = this.createReportTableItem(el);
					container.append(item);
				});
				console.log(all)
				const allItem = this.createReportTableItem(all)
				footerContainer.append(allItem)
				let title = '';
				document.querySelectorAll('.report_select_container').forEach((el) => {
					if (el.style.display !== 'none') {
						title = el.children[0].textContent;
					};
				})
				document.getElementById('report_table_type_title').textContent = title;
				document.getElementById('report_table_type_title').style.display = "block";
				document.getElementById('report_table_footer').style.display = 'table-footer-group';
				document.getElementById('report_table_thead').style.display = 'table-header-group';
				document.getElementById('report_table_card').style.display = 'block';
			};

			createReportTableItem(el) {
				const itemInitial = ` <tr class="fw-bold fs-6 text-gray-800">
				                                                <td class="text-start">${el.name}</td>
																<td>${el.neysmotr}</td>
																<td>${el.yesSC}</td>
																<td>${el.notSC}</td>
																<td>${el.noRes}</td>
																<td>${el.vsego}</td>
															</tr>`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			createDoughnut() {
				const itemInitial = `<canvas id="kt_chartjs_3" class="mh-400px"></canvas>`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			addDoughnut(dataArr) {
				const container = document.getElementById('kt_card_widget_4_chart');
				container.innerHTML = '';
				const item = this.createDoughnut();
				container.append(item)
				document.getElementById('vsego-title').textContent = dataArr.vsego
				var ctx = document.getElementById('kt_chartjs_3');
				console.log(dataArr)
				// Define colors


				// Chart labels
				const labels = [`Усмотрена ошибка, требуется служебная проверка `, `Усмотрена ошибка, не требуется служебная проверка `, `Ошибка не усмотрена`, `Не выставлена резолюция`];

				// Chart data
				const data = {
					labels: labels,
					datasets: [{
						label: 'Не выставлена резолюция',
						backgroundColor: [
							this.dangerColor, this.warningColor, this.successColor, this.infoColor
						],
						data: [Number(dataArr.yesSC), Number(dataArr.notSC), Number(dataArr.neysmotr), Number(dataArr.noRes)],
					}, ]

				}
				const config = {
					type: 'doughnut',
					data: data,
					options: {
						plugins: {
							title: {
								display: false,
							}
						},
						responsive: true,
					},
					defaults: {
						global: {
							defaultFont: this.fontFamily
						}
					}
				};

				var myChart = new Chart(ctx, config);



			};
		};
		document.addEventListener('DOMContentLoaded', () => {
			const statisticApp = new ServCheckStatisticApp();
			statisticApp.createServcheckStatisticApp();
		})
	</script>
	<!--end::Global Javascript Bundle-->
	<!--begin::jsCustom js by this page-->
	<script>
		// 
	</script>
	<!--end::jsCustom js by this page-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>