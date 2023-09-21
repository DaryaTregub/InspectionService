<?php
/* Настройки текущей страницы --->  */ $title = 'Сервис проверок';
$role = 'guest';
/* Основная логика - не менять ---> */

use App\Http\Controllers\Core;

$user = Core::Init($role);

use App\Http\Controllers\api\v1_0\SCDatainputController;

$sc_role = $user['user']['roles'];
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
        .invalid {
            border: 1px solid red;
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
                    <div class="content flex-column-fluid" id="kt_content">
                        <div class="row g-5 g-xl-8 mb-9">
                            <div class="col-xl-9">
                                <!--begin::Card-->

                                <div class="card card-xl-stretch mb-xl-8 text-center">
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                        <div class="card-toolbar">
                                            <!-- <a class="btn btn-light-success me-3" href="./servcheck-statistic">
                                                Статистика
                                            </a> -->
                                            <?php
                                            $role = 'sc_creator';
                                            if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                                echo '   <button id="create_act_btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                        <i class="fa-solid fa-plus"></i>
                                        Новый акт
                                    </button>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Heading-->

                                        <!-- begin::модальное окно Новый акт  -->
                                        <div class="modal fade text-start" tabindex="-1" id="kt_modal_1">
                                            <form id="addAct_form" class="form" action="#" autocomplete="off">
                                                <div class="modal-dialog" style="max-width: 30vw;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Создать новый акт проверки</h3>
                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                        <div class="modal-body ">
                                                            <div class="select_container text-start mb-3">
                                                                <label class="form-label required">Oрган власти</label>
                                                                <select id="departments_list" required class="form-select" data-control="select2" data-placeholder="Выберите орган власти">
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 text-start">
                                                                <label class="form-label required ">Номер входящего письма от органа власти</label>
                                                                <input id="letter_number_input" required type="text" class="form-control" name="search" value="" placeholder="Введите номер письма">
                                                            </div>
                                                            <div class="mb-0 text-start">
                                                                <label class="form-label">Дата входящего письма от органа:</label>
                                                                <input class="form-control" placeholder="Pick date rage" id="letter_datapicker" />
                                                            </div>
                                                            <!--begin::Form-->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="addAct_btn" type="submit" class="btn btn-primary">Создать акт</button>
                                                            <button id="closeAct_btn" type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end::модальное окно Новый акт  -->


                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <!--begin::Table row-->
                                                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                                                        <th class="min-w-50px">№ акта</th>
                                                        <th class="min-w-100px">Дата акта</th>
                                                        <th class="min-w-100px">Ведомство</th>
                                                        <th class="min-w-100px">Номер письма</th>
                                                        <th class="min-w-100px">Дата письма</th>
                                                        <th class="min-w-50px">Статус</th>
                                                        <th class="text-end w-20px">Действия</th>
                                                    </tr>
                                                    <!--end::Table row-->
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600" id="acts_table_body">

                                                </tbody>
                                            </table>

                                            <!--end::Heading-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div><!--end::Post-->
                            </div>
                            <div class="col-xl-3">
                                <div class="card mb-xl-8 text-center">
                                    <div class="card-header ">

                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h3 class="fw-bold">Фильтры</h3>
                                        </div>
                                        <div class="card-toolbar">
                                            <div class="menu-item px-3 d-flex  justify-content-between">
                                                <!-- <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Фильтры</div> -->
                                                <button id="reset_filters" type="button" class="btn btn-light-primary" data-kt-menu-placement="bottom-start" data-kt-menu-offset="30px, 30px">
                                                    <i class="ki-duotone ki-filter fs-2"></i> Сбросить

                                                </button>
                                            </div>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <div class="px-7 py-5">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->

                                                <!--end::Label-->

                                                <!--begin::Options-->
                                                <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-docs-table-filter="payment_type">
                                                    <!--begin::Option-->
                                                    <label for="" class="form-label text-start">Орган власти</label>
                                                    <select id="departments_filters" class="form-select mb-3 " aria-label="Select example" data-control="select2" data-placeholder="Выберите орган власти">
                                                        <option></option>
                                                    </select>
                                                    <!--end::Option-->

                                                    <!--begin::Option-->
                                                    <label for="" class="form-label text-start">Месяц</label>
                                                    <select id="months_filters" class="form-select mb-3" aria-label="Select example" data-control="select2" data-placeholder="Выберите месяц">
                                                        <option></option>
                                                    </select>
                                                    <!--end::Option-->
                                                    <label for="" class="form-label text-start">Год</label>
                                                    <!--begin::Option-->
                                                    <select id="years_filters" class="form-select mb-3" aria-label="Select example" data-control="select2" data-placeholder="Выберите год">
                                                        <option></option>
                                                    </select>
                                                    <!--end::Option-->
                                                    <label for="" class="form-label text-start">Статус</label>
                                                    <!--begin::Option-->
                                                    <select id="statuses_filters" class="form-select mb-3" aria-label="Select example" data-control="select2" data-placeholder="Выберите статус акта">
                                                        <option></option>
                                                    </select>

                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Actions-->

                                            <button id="filters_btn" type="submit" class="btn btn-primary w-100" data-kt-menu-dismiss="true" data-kt-docs-table-filter="filter">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Применять</font>
                                                </font>
                                            </button>


                                            <!--begin::Heading-->
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
        <!--end::Global Javascript Bundle-->
        <!--begin::jsCustom js by this page-->
        <script src="m_assets/js/service_custom/clientServer.js"></script>
        <script src="m_assets/js/service_custom/constructorUrl.js"></script>
        <script src="m_assets/js/service_custom/template.js"></script>
        <script src="m_assets/js/service_custom/menuClose.js"></script>
        <script>
            class ServCheckApp {
                constructor() {
                    this.url = 'api/v1_0/ServCheck';
                    this.responce = new ClientServer();
                    this.convertUrl = new ConverterUrl();
                    this.startPageContent = new StartPageContent();

                    this.userRole = <?php $user = Core::Init('guest');
                                    echo $user['user']['roles'] ?>;
                    this.departments = JSON.parse(<?php echo json_encode(SCDatainputController::ListOfDepartments(), true); ?>);
                    this.actsParams = {
                        type: 'acts',
                        department_id: '',
                        month: '',
                        year: '',
                        status: ''
                    };
                    this.acts = null;
                };

                createServCheckApp() {
                    this.createStartPage(this.actsParams); //получаем список актов b выводим в таблицу
                    this.startPageContent.setDepartments = this.departments;
                    this.startPageContent.addDepartments(); //выводим список ведомств при создании акта и в фильтры
                    this.startPageContent.addMonth(); //фильтры, список месяцев
                    this.startPageContent.addYears(); //фильтры, годы
                    this.startPageContent.addStatuses(); //фильтры, список статусов
                    this.startPageContent.activeDataPicker(); //активация календарика
                    this.startPageContent.selectsParentsModal(); //привязка селектов к модальным окнам
                    this.startPageContent.closeOpenMenu(); //сворачивание меню
                    this.menuActive(); //активация меню                    
                    this.addAct(); //добавление нового акта
                    this.actClose(); //закрытие окна добавления акта
                    this.filtersAdd(); //фильтрация
                    this.filtersReset(); //сброс фильтров
                };

                menuActive() {
                    //активация плаггина меню
                    KTMenu.createInstances();
                };

                async createStartPage(params) {
                    const url = this.convertUrl.pageUrl(this.url, params);
                    this.responce.setUrl = url;
                    this.acts = await this.responce.getData();
                    console.log(this.acts);
                    this.checkLetterNames();
                    this.startPageContent.setActs = this.acts;
                    this.startPageContent.addActsItem(); //выводим акты в таблицу                
                    this.menuActive();
                    this.actDelete(); //удаление нового акта
                };

                checkLetterNames() {
                    this.acts.forEach((el, index) => {
                        const letterName = this.checkJson(el.letter_name);
                        console.log(letterName)
                        el.letter_name = letterName;
                    });
                };

                checkJson(data) {
                    if (data) {
                        let result;
                        try {
                            result = JSON.parse(data);
                        } catch (e) {
                            result = data;
                        };
                        return result;
                    };
                };

                addAct() {
                    document.getElementById('addAct_form').addEventListener('submit', async (e) => {
                        e.preventDefault();
                        const params = {
                            type: 'addact',
                        };
                        const data = {
                            data: JSON.stringify({
                                letter_name: document.getElementById('letter_number_input').value,
                                department_id: $('#departments_list').val(),
                                letter_date: document.getElementById('letter_datapicker').value
                            })

                        };
                        const url = this.convertUrl.pageUrl(this.url, params);
                        this.responce.setUrl = url;
                        const newAct = await this.responce.postData(data);
                        console.log(newAct)
                        if (JSON.parse(newAct) == 'ok') {
                            Swal.fire({
                                text: `Акт создан!`,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Закрыть",
                                customClass: {
                                    confirmButton: "btn btn-success"
                                }
                            });
                            this.createStartPage(this.actsParams);
                            $('#kt_modal_1').modal('hide');
                            $('#departments_list').val(null).trigger('change');
                            document.getElementById('letter_number_input').value = '';
                        };
                    });
                };

                actClose() {
                    document.getElementById('closeAct_btn').addEventListener('click', (e) => {
                        $('#departments_list').val(null).trigger('change');
                    });
                };

                filtersAdd() {
                    document.getElementById('filters_btn').addEventListener('click', (el) => {
                        const params = {
                            type: 'acts',
                            department_id: $('#departments_filters').val(),
                            month: $('#months_filters').val(),
                            year: $('#years_filters').val(),
                            status: $('#statuses_filters').val()
                        }
                        this.createStartPage(params);
                    });
                };

                filtersReset() {
                    document.getElementById('reset_filters').addEventListener('click', (el) => {
                        this.createStartPage(this.actsParams);
                        $('#departments_filters').val(null).trigger('change'),
                            $('#months_filters').val(null).trigger('change'),
                            $('#years_filters').val(null).trigger('change'),
                            $('#statuses_filters').val(null).trigger('change')
                    });
                };

                actDelete() {
                    if (document.querySelectorAll('.actdelete_btn')) {
                        document.querySelectorAll('.actdelete_btn').forEach((el) => {
                            el.addEventListener('click', (e) => {
                                this.startPageContent.sweetAlertTwobtn('Вы точно желаете удалить этот акт?', 'Удалить акт', 'act-del_btn');
                                document.querySelector('.act-del_btn').addEventListener('click', async () => {
                                    const params = {
                                        type: 'dropnewact',
                                        act_id: el.dataset.delact,
                                    };
                                    const url = this.convertUrl.pageUrl(this.url, params);
                                    this.responce.setUrl = url;
                                    const result = await this.responce.getData();
                                    if (result.type == 'ok') {
                                        Swal.fire({
                                            text: `Акт удален!`,
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Закрыть",
                                            customClass: {
                                                confirmButton: "btn btn-success"
                                            }
                                        });
                                        this.createStartPage(this.actsParams);
                                    } else if (result.type == 'error') {
                                        Swal.fire({
                                            text: result.text + '!',
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Закрыть",
                                            customClass: {
                                                confirmButton: "btn btn-danger"
                                            }
                                        });
                                    };
                                });
                            });
                        });
                    };
                };
            };

            class StartPageContent {
                constructor() {
                    this.template = new Template();
                    this.acts = {};
                    this.departments = null;
                    this.years = JSON.parse(<?php echo json_encode(SCDatainputController::Year(), true); ?>);
                    this.months = JSON.parse(<?php echo json_encode(SCDatainputController::Month(), true); ?>);
                    this.statuses = JSON.parse(<?php echo json_encode(SCDatainputController::Status(), true); ?>);
                    this.closeMenu = new Menu();
                };

                /**
                 * @param {any} value
                 */
                set setActs(value) {
                    this.acts = value;
                };
                /**
                             /**
                 * @param {any} value
                 */
                set setDepartments(value) {
                    this.departments = value;
                };

                closeOpenMenu() {
                    this.closeMenu.setTime = 1;
                    this.closeMenu.createMenu();
                };

                createActsItem(el, statusClass, btn_displ) {
                    const itemInitial =
                        `  <tr class="odd acts_item text-hover-primary" id="${el.id}">
                                                            <td>
                                                                <div>${el.serial_number}</div>
                                                            </td>                                                           
                                                            <td>${el.act_date}</td>
                                                            <td>
                                                                <div>${el.department_name}</div>
                                                            </td>
                                                            <td>
                                                               ${el.letter_name}
                                                            </td>
                                                            <td>${el.letter_date}</td>
                                                            <td class="">
                                                             <div class="badge ${statusClass}">${el.status_name}</div> </td>
                                                             <td>
                                                                            <div class="me-0">
                                                                                <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary action-menu_btn" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                                                                            <rect x="10" y="3" width="4" height="4" rx="2" fill="currentColor" />
                                                                                            <rect x="10" y="17" width="4" height="4" rx="2" fill="currentColor" />
                                                                                        </svg>
                                                                                    </span> </button>
                                                                                <!--begin::Menu 3-->
                                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"  data-kt-menu="true" style="">
                                                                                    <!--begin::Heading-->
                                                                                    <div class="menu-item px-3">
                                                                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase text-start">
                                                                                            Действия
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--end::Heading-->
                                                                                    <!--begin::Menu item-->
                                                                                    <div class="menu-item px-3">
                                                                                        <a href="./servcheck-akt-${el.id}" class="menu-link px-3">
                                                                                           Открыть акт
                                                                                        </a>
                                                                                    </div>
                                                                                    <!--end::Menu item-->
                                                                                    <!--begin::Menu item-->
                                                                                    <?php
                                                                                    $role = 'sc_creator';
                                                                                    if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                                                                        echo '<div class="menu-item px-3">
                                                <a class="menu-link px-3 order-delete_btn  ${btn_displ}" data-delact="${el.id}">
                                                    Удалить акт
                                                </a>
                                            </div>';
                                                                                    }
                                                                                    ?>
                                                                                   
                                                                                    <!--end::Menu item-->
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Menu 3-->
                                                                        </td>
                                                        </tr>`;
                    this.template.setTemplate = itemInitial;
                    const itemTemplate = this.template.createFromTemplate();
                    return itemTemplate;
                };

                addActsItem() {
                    document.getElementById('acts_table_body').innerHTML = '';
                    this.acts.forEach((el) => {
                        let actsItem;
                        if (el.status == 1) {
                            actsItem = this.createActsItem(el, 'badge-light-success', 'd-none');
                        } else if (el.status == 0) {
                            actsItem = this.createActsItem(el, 'badge-light-danger', 'd-none');
                        } else {
                            actsItem = this.createActsItem(el, 'badge-light-primary', 'actdelete_btn');
                        };
                        document.getElementById('acts_table_body').append(actsItem);
                    });
                };

                addDepartments() {
                    this.departments.forEach((el) => {
                        const option = this.createOption(el.name, el.id);
                        const optionD = this.createOption(el.name, el.id);
                        document.getElementById('departments_list').add(option);
                        document.getElementById('departments_filters').add(optionD);
                    });
                };

                addMonth() {
                    Object.keys(this.months).forEach((el) => {
                        const option = this.createOption(this.months[el], el);
                        document.getElementById('months_filters').add(option);
                    });
                };

                addYears() {
                    this.years.forEach((el) => {
                        const option = this.createOption(el.year, el.year);
                        document.getElementById('years_filters').add(option);
                    });
                };

                addStatuses() {
                    Object.keys(this.statuses).forEach((el) => {
                        const option = this.createOption(this.statuses[el], el);
                        document.getElementById('statuses_filters').add(option);
                    });
                };

                createOption(name, id) {
                    const optionInitial = `
                <option value="${id}">${name}</option>`;
                    this.template.setTemplate = optionInitial;
                    const optionTemplate = this.template.createFromTemplate();
                    return optionTemplate;
                };

                sweetAlertTwobtn(text, confirmBtnText, confirmbtnClass) {
                    Swal.fire({
                        html: `${text}`,
                        icon: "error",
                        buttonsStyling: false,
                        showCancelButton: true,
                        confirmButtonText: `${confirmBtnText}`,
                        cancelButtonText: 'Закрыть',
                        customClass: {
                            confirmButton: `btn btn-primary ${confirmbtnClass}`,
                            cancelButton: 'btn btn-danger'
                        }
                    });
                };

                selectsParentsModal() {
                    $("#departments_list").select2({
                        tags: true,
                        dropdownParent: $("#kt_modal_1")
                    });

                }

                activeDataPicker() {
                    $("#letter_datapicker").daterangepicker({
                        'viewMode': "calendar",
                        "autoUpdateInput": true,
                        'singleDatePicker': true,
                        'showDropdowns': true,
                        "locale": {
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
                        // });
                    });
                };
            }
            document.addEventListener("DOMContentLoaded", () => {
                const servCheckApp = new ServCheckApp();
                servCheckApp.createServCheckApp();
            });
        </script>
        <!--end::jsCustom js by this page-->
        <!--end::Javascript-->
</body>
<!--end::Body-->

</html>