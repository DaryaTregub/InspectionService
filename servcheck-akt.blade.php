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
    <style>
        .active h3 {
            color: #181C32 !important;
        }

        .form-control:disabled {
            color: var(--kt-input-color) !important;
            background-color: var(--kt-input-bg) !important;
            border: 1px solid var(--kt-input-border-color) !important;
        }

        .aside {
            width: 0;
        }
    </style>
    <!--end::cssCustom js by this page-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed">
    <?php echo Core::GetThemeMode() . Core::Getloader(); ?>
    <!--begin::Main--><!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div id="act_page-content" class="page d-flex flex-row flex-column-fluid d-none">
            <!--begin::Wrapper--><?php echo Core::GetWrapper((isset($style) ? $style : 'full')); ?><!--<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">-->
            <?php echo Core::GetHeader((isset($style) ? $style : 'full')); ?>
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column-fluid">
                <?php echo Core::GetMenu((isset($style) ? $style : 'full')); ?>
                <!--begin::Container-->
                <div class="d-flex flex-column flex-column-fluid container-fluid">
                    <!--begin::Post-->
                    <div id="orders-search_modal" class="modal fade" tabindex="-1" id="kt_modal_1">
                        <div class="modal-dialog" style="max-width: 60vw;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Добавить дело в таблицу</h3>

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>

                                <div class="modal-body">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <div class="card-body py-3">
                                            <form id="search-orders_form" class="mb-5">
                                                <div class="d-flex align-items-center">

                                                    <!--begin::Input group-->
                                                    <div class="position-relative w-100 me-md-2" style="flex: 1 1 82%">
                                                        <input id="order-search_input" type="text" class="form-control form-control-solid ps-10 " name="search" value="" placeholder="Введите номер дела или Ф.И.О заявителя">
                                                        <span class="svg-icon svg-icon-muted svg-icon-1hx position-absolute top-50 translate-middle-y ms-4"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <span id="orders-search-cleane_btn" class="svg-icon svg-icon-muted svg-icon-1hx position-absolute top-50 translate-middle-y end-0 me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="currentColor" />
                                                                <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>

                                                    <!--end::Input group-->
                                                    <!--begin:Action-->
                                                    <button id="orders-search_btn" type="submit" class="btn btn-primary w-100" id="kt_button_1" style="flex: 1 1 18%">
                                                        <span class="indicator-label">
                                                            Поиск
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Идет поиск...<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                    <!--end:Action-->
                                                </div>
                                                <div id="search-orders_danger-text" class="text-danger mt-3"></div>
                                                <div class="form-check mt-5">
                                                    <input id="old_period_check" class="form-check-input" type="checkbox" value="" checked />
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        за последние 6 месяцев
                                                    </label>
                                                </div>
                                                <div class="form-check mt-5">
                                                    <input id="pkpvd_search_check" class="form-check-input" type="checkbox" value="" />
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        поиск по номеру ПКПВД
                                                    </label>
                                                </div>
                                            </form>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="fw-bold fs-6 text-gray-800" id="search-orders_thead" style="display:none">
                                                            <th></th>
                                                            <th>Номер дела</th>
                                                            <th>Ф.И.О. заявителя</th>
                                                            <th>МФЦ</th>
                                                            <th>Дата</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="search-orders_list">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--begin::Body-->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button id="add-order_btn" type="button" class="btn btn-primary">Добавить в акт</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade comission_modal" tabindex="-1" id="kt_modal_2">
                        <div class="modal-dialog" style="max-width: 30vw;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Состав комиссии</h3>

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>

                                <div class="modal-body">
                                    <div class="select_container comission_select mb-3">
                                        <label for="" class="form-label">Председатель комиссии</label>
                                        <select id="comission_list_president" data-role="1" class="form-select comission_list" data-allow-clear="true" data-control="select2" data-placeholder="Выберите председателя комиссии">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="select_container comission_select mb-3">
                                        <label for="" class="form-label ">Секретарь комиссии</label>
                                        <select id="comission_list_secretary" data-role="2" class="form-select comission_list" data-allow-clear="true" data-control="select2" data-placeholder="Выберите секретаря комиссии">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="select_container comission_select">
                                        <label for="" class="form-label">Члены комиссии</label>
                                        <select id="comission_list_members" class="form-select comission_list" data-role="0" data-control="select2" data-placeholder="Выберите членов комиссии" multiple="multiple">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button id="comission_add_btn" type="button" class="btn btn-primary">
                                        Сохранить изменения
                                    </button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content flex-column-fluid" id="kt_content">
                        <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column me-3">
                                <!--begin::Title-->
                                <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                                    Акт № <span id="act_number" style="margin-right: 5px;"></span>
                                    ( <span id="act_department-name"></span> ) от <span id="act_date" style="margin-left: 5px;"></span>
                                </h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                        <a href="./servcheck" class="text-gray-600 text-hover-primary">
                                            <span class="svg-icon svg-icon-muted svg-icon-1hx"><svg style="transform:translateY(-2px);" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor" />
                                                </svg>
                                            </span> На главную </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-500">
                                        Акт № <span id="current_act_number"></span> </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-2 py-md-1">
                                <div class="me-3" style="visibility: hidden;">
                                    <!--begin::Menu-->
                                    <a id="test_btn" href="" class="btn btn-light-info fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-filter fs-5 text-gray-500 me-1"><span class="path1"></span><span class="path2"></span></i>
                                        Тест
                                    </a>
                                </div>
                                <?php
                                $role = 'sc_admin';
                                if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                    echo ' <div class="me-3">
                                    <!--begin::Menu-->
                                    <a id="download_act" href="" class="btn btn-light-info fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-filter fs-5 text-gray-500 me-1"><span class="path1"></span><span class="path2"></span></i>
                                        Сформировать акт
                                    </a>
                                </div>';
                                }
                                ?>
                                   <?php
                                $role = 'sc_creator';
                                if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                    echo ' <div class="me-3">
                                    <!--begin::Menu-->
                                    <a id="load_act-statistic_btn" href="" class="btn btn-light-info fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-filter fs-5 text-gray-500 me-1"><span class="path1"></span><span class="path2"></span></i>
                                        Скачать отчет
                                    </a>
                                </div>';
                                }
                                ?>
                                <?php
                                $role = 'sc_creator';
                                if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                    echo ' <div class="me-3">
                                    <!--begin::Menu-->
                                    <a id="start_check_btn" href="" class="btn btn-light-success fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-filter fs-5 text-gray-500 me-1"><span class="path1"></span><span class="path2"></span></i>
                                        Начать проверку
                                    </a>
                                </div>';
                                }
                                ?>
                             
                                <!-- <div class="me-3"> -->
                                <!--begin::Menu-->
                                <!-- <a id="close_check_btn" href="" class="btn btn-light-danger fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-filter fs-5 text-gray-500 me-1"><span class="path1"></span><span class="path2"></span></i>
                                        Завершить поверку
                                    </a> -->
                                <!-- </div> -->

                                <?php
                                $role = 'sc_admin';
                                if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                    echo '<div class="me-3">
                                    <!--begin::Menu-->
                                    <a id="complete_act_btn" href="" class="btn btn-light-danger fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-filter fs-5 text-gray-500 me-1"><span class="path1"></span><span class="path2"></span></i>
                                        Завершить проверку
                                    </a>
                                </div>';
                                }
                                ?>
                                <!--begin::Wrapper-->

                                <?php $role = 'sc_admin';
                                if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                    echo '<div class="me-3">
                                                <!--begin::Menu-->
                                                <a id="take-resolution_btn" type="button" class="btn btn-light-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Запросить резолюцию
                                                </a>
                                            </div>';
                                }
                                ?>

                                <!--end::Wrapper-->
                                <!--begin::Button-->
                                <a href="./servcheck" class="btn btn-primary fw-bold">
                                    Назад </a>
                                <!--end::Button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <div class="card card-xl-stretch mb-xl-8">
                            <div class="card-header border-0 pt-5">
                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a id="act_orders-tabs" class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">
                                            <h3 style="color: #A1A5B7">Дела</h3>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="act_comission-tabs" class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">
                                            <h3 style="color: #A1A5B7">Комиссия</h3>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="act_terms-tabs" class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">
                                            <h3 style="color: #A1A5B7">Информация и сроки проверки</h3>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="act_documents-tabs" class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_4">
                                            <h3 style="color: #A1A5B7">Приложение</h3>
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-toolbar">
                                    <?php $role = 'sc_admin';
                                    if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                        echo '<a id="act_orders-add-btn" href="" class="btn btn-light-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i> Добавить
                                </a>';
                                    }
                                    ?>
                                    <?php
                                    $role = 'sc_creator';
                                    if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                        echo ' <a id="act_comission-change-btn" href="" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="display: none;">
                                    <i class="ki-duotone ki-plus fs-2"></i> Изменить
                                </a>';
                                    }
                                    ?>
                                    <?php
                                    $role = 'sc_creator';
                                    if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                        echo '  <button id="letter_change_btn" type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#terns_modal" style="display: none;">
                                        Изменить срок
                                    </button>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                    <div class="row g-5 g-xl-8">
                                        <div class="col-xl-12">
                                            <div class="card mb-xl-8">
                                                <!--begin::Body-->
                                                <div class="card-body py-3">
                                                    <!--begin::Table container-->
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr class="fw-bold fs-6 text-gray-800">
                                                                    <th>Статус</th>
                                                                    <th>Номер дела</th>
                                                                    <th>Дата</th>
                                                                    <th>МФЦ</th>
                                                                    <th>Сотрудник допустивший ошибку</th>
                                                                    <th id="personal_resolution_th">Личная резолюция</th>
                                                                    <th>Итоговая резолюция</th>
                                                                    <th>Cлужебная проверка</th>
                                                                    <th>Действия</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="orders_table_body">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end::Table container-->
                                                </div>
                                                <!--begin::Body-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                    <div class="col-xl-12">
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body py-3">
                                                <div class="tab-content">
                                                    <!--begin::Tap pane-->
                                                    <div class="tab-pane fade show active" id="kt_table_widget_4_tab_1" role="tabpanel">
                                                        <!--begin::Table container-->
                                                        <div class="table-responsive d-flex">
                                                            <div style="flex: 1 1 70%;">
                                                                <!--begin::Table-->
                                                                <table class="table">
                                                                    <!--begin::Table head-->
                                                                    <thead>
                                                                        <tr class="fw-bold fs-6 text-gray-800">
                                                                            <th class="p-0 w-50px"></th>
                                                                            <th class="p-0 min-w-300px">Ф.И.О., роль</th>
                                                                            <th class="p-0 min-w-140px">Подразделение</th>
                                                                            <th class="p-0 min-w-140px">Должность</th>
                                                                            <th class="p-0 min-w-120px">Статистика</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <!--end::Table head-->

                                                                    <!--begin::Table body-->
                                                                    <tbody id="comission_list">
                                                                    </tbody>
                                                                    <!--end::Table body-->
                                                                </table>
                                                            </div>
                                                            <div style="flex: 1 1 30%">
                                                                <canvas id="kt_chartjs_3" class="mh-350px"></canvas>
                                                            </div>
                                                        </div>
                                                        <!--end::Table-->
                                                    </div>

                                                    <!--end::Table-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">

                                    <div class="row g-5 g-xl-8">
                                        <div class="col-xl-12">
                                            <div class="card mb-xl-8">
                                                <!--begin::Body-->
                                                <div class="card-body py-3">
                                                    <p><span class="fw-bold fs-6 text-gray-800">Письмо № </span><span id="letter_number"></span> от <span id="letter_date"></span></p>
                                                    <p><span class="fw-bold fs-6 text-gray-800">Дата окончания проверки: </span><span id="letter_allcheck"></span></p>
                                                    <p><span class="fw-bold fs-6 text-gray-800">Срок подачи пояснительной и объяснительной: </span><span id="letter_note_date"></span></p>
                                                    <p><span class="fw-bold fs-6 text-gray-800">Причина изменения срока: </span></p>
                                                    <div id="letter_comment" class="d-flex flex-column">
                                                    </div>
                                                </div>
                                                <!--end::Table container-->
                                            </div>
                                            <!--begin::Body-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">

                                    <div class="row g-5 g-xl-8">
                                        <div class="col-xl-12">
                                            <div class="card mb-xl-8">
                                                <!--begin::Body-->
                                                <div class="card-body py-3">
                                                    <div class="row g-5 g-xl-8">

                                                        <div class="col-xl-6">
                                                            <div class="rounded border p-5">
                                                                <?php
                                                                $role = 'sc_creator';
                                                                $role1 = 'sc_admin';
                                                                if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false || strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role1 . '"') != false) {
                                                                    echo ' <form class="form" method="post" id="act_dropzone_form">
                                        <div class="dropzone" id="kt_dropzonejs_example_1">
                                            <!--begin::Message-->
                                            <div class="dz-message needsclick">
                                                <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Info-->
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Перетащите файл сюда или нажмите</h3>
                                                    <span class="fs-7 fw-semibold text-gray-400">Можно загрузить 1 файл</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
                                        <!--end::Dropzone-->
                                        <!-- </div> -->
                                        <select id="act_dropzone_select" class="form-select mt-5 mb-5" data-control="select2" data-placeholder="Выберите тип файла" require>
                                            <option></option>
                                            <option value="1">Письмо</option>
                                            <option value="2">Акт</option>
                                            <option value="3">Приказ</option>
                                            <option value="4">Отчет</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mb-5 w-100" id="act_dropzone_submit_btn">Загрузить</button>
                                    </form>';
                                                                }
                                                                ?>

                                                                <table class="table">
                                                                    <tbody id="files_container">

                                                                    </tbody>
                                                                </table>


                                                                <!-- <button type="submit" class="btn btn-light-danger w-100 mb-5" id="act_dropzone_delete_btn">Удалить</button> -->

                                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-07-19-150827/core/html/src/media/icons/duotune/general/gen005.svg-->

                                                                <!--end::Svg Icon-->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--end::Form-->
                                                    <!-- <div class="embed-responsive embed-responsive-21by9">
                                                        <iframe class="embed-responsive-item" src="/public/m_assets/media/1П-98.pdf"></iframe>
                                                    </div> -->
                                                </div>
                                                <!--end::Table container-->
                                            </div>
                                            <!--begin::Body-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 g-xl-8">
                        </div>

                        <div class="modal fade" tabindex="-1" id="terns_modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="letter_term_change_form" action="">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Изменение срока</h3>

                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <!--end::Close-->
                                        </div>

                                        <div class="modal-body">
                                            <!-- <div class="text-start mb-3">
                                                <label class="form-label required">Категория срока:</label>
                                                <select id="letter_terns_category" class="form-select" required data-control="select2" data-placeholder="Выберите категорию">
                                                    <option></option>
                                                    <option value="allcheck_date">Дата завершения акта проверки</option>
                                                    <option value="note_date">Дата окончания предоставления объяснительной и пояснительной</option>
                                                </select>
                                            </div> -->
                                            <div class="text-start mb-3">
                                                <label class="form-label  required">Дата завершения проверки:</label>
                                                <input class="form-control" required placeholder="Выберите дату" id="allcheck_date_datapicker" />
                                            </div>

                                            <div class="text-start mb-3">
                                                <label class="form-label  required">Дата предоставления объяснительной и пояснительной:</label>
                                                <input class="form-control" required placeholder="Выберите дату" id="note_date_datapicker" />
                                            </div>
                                            <div class="text-start mb-3">
                                                <label class="form-label">Комментарий</label>
                                                <input id="letter_terns_comment" type="text" class="form-control" placeholder="Введите текст" />
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button id="letter_term_change_btn" type="submit" class="btn btn-primary">Сохранить изменения</button>
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" tabindex="-1" id="take_resolution_modal">
                            <div class="modal-dialog" style="max-width: 45vw;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Запросить резолюцию</h3>

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>

                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-gray-800">
                                                    <th style="width: 50px;"></th>
                                                    <th class="min-w-140px">Ф.И.О., роль</th>
                                                    <th class="min-w-140px">Должность</th>
                                                    <th class="min-w-140px">Электронная почта</th>
                                                </tr>
                                            </thead>
                                            <tbody id="take_resolution_container">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
                                        <button id="take_resolution_btn" type="button" class="btn btn-primary">Запросить резолюцию</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!--end::Tables Widget 4-->
            </div>
            <!--begin::Tables Widget 4-->
        </div><!--end::Post-->
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
    <script src="m_assets/js/service_custom/sweetAlerts.js"></script>
    <script src="m_assets/js/service_custom/menuClose.js"></script>
    <script>
        class ServCheckActApp {
            constructor() {
                this.url = 'api/v1_0/ServCheck';
                this.responce = new ClientServer();
                this.convertUrl = new ConverterUrl();
                this.actPageContent = new ActPageContent();
                this.act = null;
                this.user = <?php $user = Core::Init('guest');
                            echo $user['user']['id'] ?>;
                this.userRole = <?php $user = Core::Init('guest');
                                echo $user['user']['roles'] ?>;
                this.comission = <?php echo SCDatainputController::FindServiceMember('front'); ?>;
                this.scRole = null;

            };

            createServCheckActApp() {
                this.createActPage(); //рендерим страницу акта
            };

            getActId() {
                const href = window.location.href;
                const id = href.substring(href.lastIndexOf('-') + 1);
                return id;
            };

            loadActStatistic() {
                if (document.getElementById('load_act-statistic_btn')) {
                    const params = {
                        type: 'download_report',
                        act_id: this.act.id
                    };
                    const url = this.convertUrl.pageUrl(this.url, params);
                    console.log(url)
                    document.getElementById('load_act-statistic_btn').href = url;
                };

            };

            async createActPage() {
                // this.roleCheckLoadPage();
                const actID = this.getActId();
                const params = {
                    type: 'selected_act',
                    act_id: actID
                };
                const url = this.convertUrl.pageUrl(this.url, params);
                this.responce.setUrl = url;
                this.act = await this.responce.getData();
                console.log(this.act)
                this.checkCurrentUser();
                // this.rolesController.setRole = this.userRole;
                // this.rolesController.scCreatorServcheckActStaticContent(); //статический контент для роли sc_creator
                this.actPageContent.setActInfo = this.act;
                this.actPageContent.setComission = this.comission;
                this.actPageContent.addActContent();
                this.actPageContent.addOrdersList(); //добавление таблицы дел
                this.actPageContent.menuActive(); //активация меню
                this.actPageContent.switchTabsHideBtn(); //скрытие и появление кнопок
                this.actPageContent.actLoad(); //показываем акт после добавления всей информации
                this.actPageContent.cleaneOrdersSearchInput(); //очистка инпута поиска дел при нажатии на крестик
                this.actPageContent.addMembersList(); //добавление членов комиссии в селекты
                this.actPageContent.selectComission(); //если члены комиссии были сохранены в акте, то они добавятся
                this.actPageContent.activeDataPicker();
                this.actPageContent.selectsParentsModal(); //привязка селектов к родителю-модальному окну
                this.actPageContent.orderSearchModalOpen();
                this.actPageContent.addFilesList();
                this.downloadAct();
                this.closeAct();
                // this.rolesController.scCreatorServcheckActTabsBtns();
                this.addComissionTable(); //вывод таблицы членов комиссии
                this.searchOrder(); //поиск дел
                this.addOrder() //добавление дела
                this.deleteOrder(); //удаление дела
                this.closeSearchOrdersModal() //ребут модалки при закрытии
                this.comissionMembersSelectSearch(); //добавление поиска в мультиселект комиссии
                this.saveComission(); //сохранение комиссии
                this.getComissionEmailList(); //запросить резолюцию
                this.useDiagram(); //диаграмма
                this.completeAct(); //завершить акт
                this.letterTermChange(); //изменение срока письма
                this.startCheck();
                this.methodTest();
                this.takeResolution();
                this.loadActStatistic();
                this.dropzoneActive();
                this.loadFiles();
                this.deleteFile();
                // this.closeCheck();

            };

            dropzoneActive() {
                this.myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
                    url: "./api/v1_0/ServCheck?type=storage_file", // Set the url for your upload script location
                    paramName: "file", // The name that will be used to transfer the file
                    maxFiles: 1,
                    maxFilesize: 3, // MB
                    method: 'post',
                    addRemoveLinks: true,
                    // autoProcessQueue: false,
                    accept: function(file, done) {
                        if (file.name == "wow.jpg") {
                            done("Naha, you don't.");
                        } else {
                            done();
                        }
                    },
                    init: function() {
                        this.on("sending", function(file, xhr, data) {

                            // if (file.fullPath) {
                            //     data.append("full_path", file.fullPath);
                            // }
                            // if (file.name) {
                            //     data.append("fullName", file.name);
                            // };
                        });
                    },
                    success: (file, response) => {
                        this.file_uuid = response;


                    }
                });
            };

            loadFiles() {
                if (document.getElementById('act_dropzone_form')) {
                    document.getElementById('act_dropzone_form').addEventListener('submit', async (e) => {
                        e.preventDefault();

                        if (this.myDropzone.files.length > 0) {
                            if ($('#act_dropzone_select').val()) {
                                const params = {
                                    type: 'attach_file'
                                };
                                const data = {
                                    file_info: JSON.stringify({
                                        file_uuid: this.file_uuid,
                                        type_files: $('#act_dropzone_select').val(),
                                        act_id: this.act.id
                                    })
                                };
                                const url = this.convertUrl.pageUrl(this.url, params);
                                this.responce.setUrl = url;
                                const result = await this.responce.postData(data);
                                this.act.files = result;
                                this.actPageContent.setActInfo = this.act;
                                this.actPageContent.addFilesList();
                                this.myDropzone.removeAllFiles();
                                $('#act_dropzone_select').val(null).trigger('change');
                                this.deleteFile();

                            } else {
                                this.actPageContent.alerts.setText = 'Выберите тип файла!';
                                this.actPageContent.alerts.sweetAlertError();
                            };
                        } else {
                            this.actPageContent.alerts.setText = 'Добывьте файл!';
                            this.actPageContent.alerts.sweetAlertError();
                        };
                    });
                }

            };

            deleteFile() {
                document.querySelectorAll('.delete_file').forEach((el) => {
                    el.addEventListener('click', async (e) => {
                        e.preventDefault();
                        console.log(el.dataset.uuid)
                        const params = {
                            type: 'del_file',
                            act_id: this.act.id,
                            uuid: el.dataset.uuid
                        };
                        const url = this.convertUrl.pageUrl(this.url, params);
                        this.responce.setUrl = url;
                        const result = await this.responce.getData();
                        console.log(result);
                        this.act.files = result;
                        this.actPageContent.setActInfo = this.act;
                        this.actPageContent.addFilesList();
                        this.myDropzone.removeAllFiles();
                        this.deleteFile();
                        // http://127.0.0.1:8000/api/v1_0/ServCheck?type=del_file
                        // this.actPageContent.alerts.setText = 'Кнопка временно не работает!';
                        // this.actPageContent.alerts.sweetAlertError();
                    })
                })
            }


            methodTest() {
                document.getElementById('test_btn').addEventListener('click', async (e) => {
                    e.preventDefault();
                    const params = {
                        type: 'send_mail',
                        act_id: this.act.id,
                    };
                    const data = {
                        user_data: JSON.stringify({
                            role: 1,
                            members: {
                                10: {
                                    fio: 'Трегуб Дарья Анатольевна',
                                    email: 'Tregub.Darya@mfc-chita.ru'
                                },
                                151: {
                                    fio: 'Семченкова Ирина Игоревна',
                                    email: 'Semchenkova.Irina@mfc-chita.ru'
                                },
                            },
                        }),
                    };
                    const url = this.convertUrl.pageUrl(this.url, params);
                    this.responce.setUrl = url;
                    const result = await this.responce.postData(data);
                    console.log(result);
                });
            };

            async checkCurrentUser() {
                const params = {
                    type: 'get_user_role',
                    act_id: this.act.id
                };
                const url = this.convertUrl.pageUrl(this.url, params);
                this.responce.setUrl = url;
                const result = await this.responce.getData();
                console.log(result)
                this.scRole = result;

                // this.actPageContent.rolesController.setScRole = result;
                // this.actPageContent.rolesController.scPresidentActCloseAct();
            };

            closeAct() {
                if (this.act.status == 0) {
                    this.actPageContent.closeActContent();
                };
            };

            downloadAct() {
                if (document.getElementById('download_act') && this.act.orders) {
                    const params = {
                        type: 'download_act',
                        act_id: this.act.id,
                        letter_id: this.act.letter_id
                    };
                    const url = this.convertUrl.pageUrl(this.url, params);
                    document.getElementById('download_act').href = url;
                };
            };

            // closeCheck() {
            //     if (document.getElementById('close_check_btn')) {
            //         document.getElementById('close_check_btn').addEventListener('click', (e) => {
            //             e.preventDefault();
            //             this.actPageContent.alerts.setText = `Вы точно желаете завершить проверку?`;
            //             this.actPageContent.alerts.setConfirmBtnText = "Завершить проверку!";
            //             this.actPageContent.alerts.setConfirmBtnClass = 'close-check_btn';
            //             this.actPageContent.alerts.sweetAlertTwobtn();
            //             document.querySelector('.close-check_btn').addEventListener('click', async () => {
            //                 const params = {
            //                     type: 'send_mail',
            //                     act_id: this.act.id,
            //                 };
            //                 const data = {
            //                     user_data: JSON.stringify({
            //                         role: 7
            //                     })
            //                 };
            //                 const url = this.convertUrl.pageUrl(this.url, params);
            //                 this.responce.setUrl = url;
            //                 const result = await this.responce.postData(data);
            //                 console.log(result);
            //             });
            //         });
            //     };
            // };

            searchOrder() {
                const input = document.getElementById('order-search_input')
                let timeout = null;
                let value;
                const sendInputContent = (e) => {
                    e.preventDefault();
                    document.getElementById('search-orders_danger-text').textContent = '';
                    clearTimeout(timeout);
                    timeout = setTimeout(async () => {
                        value = input.value.trim().replace(/\s+/g, ' ');
                        if (value && value.length > 3) {
                            this.addSearchOrdersTable(value);
                        } else {
                            document.getElementById('search-orders_danger-text').textContent = 'введите не менее 4 символов';
                        }
                    }, 600);
                };

                input.addEventListener('input', sendInputContent);
                // document.getElementById('pkpvd_search_check').addEventListener('change',sendInputContent);
                // document.getElementById('old_period_check').addEventListener('change', sendInputContent);
                document.getElementById('search-orders_form').addEventListener('submit', sendInputContent);
            };

            async addSearchOrdersTable(value) {
                this.actPageContent.loaderActive();
                const params = {
                    type: 'search',
                    requester_fio: value,
                    old_period: 0,
                    param: 'other'

                };
                if (!document.getElementById('old_period_check').checked) {
                    params.old_period = 1;
                };
                if (document.getElementById('pkpvd_search_check').checked) {
                    params.param = 'pkpvd';
                };
                const url = this.convertUrl.pageUrl(this.url, params);
                this.responce.setUrl = url;
                const result = await this.responce.getData();
                this.actPageContent.setSearchOrders = result;
                let timeout = null;
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    this.actPageContent.addSearchOrdersList();
                    this.checkOneOrder();
                }, 300);
                document.getElementById('orders-search_btn').removeAttribute("data-kt-indicator");
                document.getElementById('orders-search_btn').disabled = false;
            };

            checkOneOrder() {
                document.querySelectorAll('.selected_search_order_check').forEach((el, i) => {
                    el.addEventListener('change', () => {
                        if (el.checked) {
                            document.querySelectorAll('.selected_search_order_check').forEach((item, j) => {
                                if (j !== i) {
                                    item.setAttribute('disabled', 'disabled');
                                };
                            });
                        } else {
                            document.querySelectorAll('.selected_search_order_check').forEach((item, j) => {
                                if (j !== i) {
                                    item.removeAttribute('disabled');
                                };
                            });
                        };
                    });
                });
            };

            addOrder() {
                document.getElementById('add-order_btn').addEventListener('click', async () => {
                    if (document.querySelector('.orders-search_item')) {
                        let orderNumber;
                        document.querySelectorAll('.selected_search_order_check').forEach((el) => {
                            if (el.checked) {
                                orderNumber = el.dataset.orderNumber;
                            };
                        });

                        if (orderNumber) {
                            const params = {
                                type: 'addneworder',
                                act_id: this.act.id,
                                order_number: orderNumber,
                                department_id: this.act.department_id
                            };
                            const url = this.convertUrl.pageUrl(this.url, params);
                            this.responce.setUrl = url;
                            const result = await this.responce.getData();
                            if (result.orders) {
                                this.act.orders = result.orders;
                                console.log(this.act.orders);
                                this.actPageContent.setActInfo = this.act;
                                this.actPageContent.addOrdersList();
                                this.actPageContent.menuActive();
                                this.deleteOrder();
                                this.actPageContent.alerts.setText = 'Дело добавлено!';
                                this.actPageContent.alerts.setSuccessBtnClass = "order-add-close_btn";
                                this.actPageContent.alerts.sweetAlertSuccess('Дело добавлено!');
                                if (document.querySelector('.order-add-close_btn')) {
                                    document.querySelector('.order-add-close_btn').addEventListener('click', () => {
                                        $('#orders-search_modal').modal('hide');
                                    });
                                };
                            } else if (result.type == 'error') {
                                this.actPageContent.alerts.setText = result.text + '!';
                                this.actPageContent.alerts.sweetAlertError();
                            };
                        } else {
                            this.actPageContent.alerts.setText = 'Выберите дело!';
                            this.actPageContent.alerts.sweetAlertError();
                        };
                    } else {
                        this.actPageContent.alerts.setText = 'Выберите дело!';
                        this.actPageContent.alerts.sweetAlertError();
                    };
                });
            };

            closeSearchOrdersModal() {
                $("#orders-search_modal").on("hidden.bs.modal", () => {
                    this.actPageContent.cleaneOrdersSearchModal();
                });
            };

            deleteOrder() {
                if (document.querySelectorAll('.order-delete_btn')) {
                    document.querySelectorAll('.order-delete_btn').forEach((el, index) => {
                        el.addEventListener('click', (e) => {
                            console.log(this.act.orders[index].resolution)
                            if (this.act.orders[index].resolution == 'нет данных') {
                                this.actPageContent.alerts.setText = `Вы точно желаете удалить дело из акта ?`;
                            } else {
                                this.actPageContent.alerts.setText = `Внимание! По этому делу выставлена резолюция! Вы точно желаете удалить дело из акта ?`;
                            };
                            this.actPageContent.alerts.setConfirmBtnText = "Удалить дело!";
                            this.actPageContent.alerts.setConfirmBtnClass = 'order-del';
                            this.actPageContent.alerts.sweetAlertTwobtn();
                            document.querySelector('.order-del').addEventListener('click', async () => {
                                const params = {
                                    type: 'del_order',
                                    act_id: this.act.id,
                                    order_id: el.dataset.delId
                                };
                                const url = this.convertUrl.pageUrl(this.url, params);
                                this.responce.setUrl = url;
                                const result = await this.responce.getData();
                                if (result) {
                                    this.actPageContent.alerts.setText = `Дело удалено!`
                                    this.actPageContent.alerts.sweetAlertSuccess();
                                    this.act.orders = result.orders;
                                    this.actPageContent.setActInfo = this.act;
                                    this.actPageContent.addOrdersList();
                                    this.actPageContent.menuActive();
                                    this.deleteOrder();
                                    console.log(result)
                                };
                            });
                        });
                    });
                };
            };

            comissionMembersSelectSearch() {
                const Utils = $.fn.select2.amd.require('select2/utils');
                const Dropdown = $.fn.select2.amd.require('select2/dropdown');
                const DropdownSearch = $.fn.select2.amd.require('select2/dropdown/search');
                const CloseOnSelect = $.fn.select2.amd.require('select2/dropdown/closeOnSelect');
                const AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');
                const dropdownAdapter = Utils.Decorate(Utils.Decorate(Utils.Decorate(Dropdown, DropdownSearch), CloseOnSelect), AttachBody);
                $('#comission_list_members').select2({
                    dropdownAdapter: dropdownAdapter,
                    tags: true,
                    dropdownParent: $("#kt_modal_2")
                });
            };

            saveComission() {
                if (document.getElementById('comission_add_btn')) {
                    document.getElementById('comission_add_btn').addEventListener('click', async (e) => {
                        const value = {
                            members: {
                                act_id: this.act.id,
                                role_0: $('#comission_list_members').val(),
                                role_1: $('#comission_list_president').val(),
                                role_2: $('#comission_list_secretary').val()
                            }
                        };
                        let arr = [];
                        if (value.members.role_0) {
                            value.members.role_0.forEach((el) => {
                                arr.push(el);
                            });
                        }
                        if (value.members.role_1) {
                            arr.push(value.members.role_1);
                        };
                        if (value.members.role_2) {
                            arr.push(value.members.role_2);
                        };
                        if (this.checkSelectValueUnique(arr)) {
                            this.actPageContent.alerts.setText = 'Члены комиссии не должны повторяться!';
                            this.actPageContent.alerts.sweetAlertError();
                        } else {
                            const params = {
                                type: 'list_members'
                            };
                            console.log(value);
                            const url = this.convertUrl.pageUrl(this.url, params);
                            this.responce.setUrl = url;
                            const result = await this.responce.postData(value);
                            this.checkCurrentUser();
                            this.act.member_cnt_resolution = result;
                            this.act.members.member = value.members.role_0;
                            this.act.members.president = value.members.role_1;
                            this.act.members.secretary = value.members.role_2;
                            this.actPageContent.setActInfo = this.act;
                            this.addComissionTable();
                            this.actPageContent.alerts.setText = `Члены комиссии сохранены!`;
                            this.actPageContent.alerts.setSuccessBtnClass = 'commision-complete_btn'
                            this.actPageContent.alerts.sweetAlertSuccess();
                            if (document.querySelector('.commision-complete_btn')) {
                                document.querySelector('.commision-complete_btn').addEventListener('click', () => {
                                    $('.comission_modal').modal('hide');
                                });
                            };
                        };
                    });
                };
            };

            checkSelectValueUnique(arr) {
                return arr.some(x => arr.indexOf(x) !== arr.lastIndexOf(x));
            };

            addComissionTable() {
                const comission = {
                    members: null,
                    president: null,
                    secretary: null
                };
                const members = [];
                this.comission.forEach((el) => {
                    this.act.members.member.forEach((id) => {
                        if (el.id == id) {
                            members.push(el);
                        };
                    });
                });
                comission.members = members;
                this.comission.forEach((el) => {
                    if (el.id == this.act.members.secretary) {
                        comission.secretary = el;
                    };
                });
                this.comission.forEach((el) => {
                    if (el.id == this.act.members.president) {
                        comission.president = el;
                    };
                });
                this.actPageContent.setComissionTable = comission;
                this.actPageContent.addComissionList();
            };

            getComissionEmailList() {
                if (document.getElementById('take-resolution_btn')) {
                    document.getElementById('take-resolution_btn').addEventListener('click', async (e) => {
                        e.preventDefault();
                        if (this.act.orders) {
                            if (this.act.members.member.length > 0 || this.act.members.president || this.act.members.secretary) {
                                const params = {
                                    type: 'list_email',
                                    act_id: this.act.id,
                                };
                                const url = this.convertUrl.pageUrl(this.url, params);
                                this.responce.setUrl = url;
                                const result = await this.responce.getData();
                                this.actPageContent.setComissionEmailList = result;
                                this.actPageContent.addComissionEmailList();
                                $('#take_resolution_modal').modal('show');
                            } else {
                                this.actPageContent.alerts.setText = 'Добавьте всех членов комиссии!';
                                this.actPageContent.alerts.sweetAlertError();
                            }
                        } else {
                            this.actPageContent.alerts.setText = 'Добавьте дела в акт!';
                            this.actPageContent.alerts.sweetAlertError();
                        };
                    });
                };
            };


            takeResolution() {
                if (document.getElementById('take_resolution_btn')) {
                    document.getElementById('take_resolution_btn').addEventListener('click', async (e) => {
                        e.preventDefault();
                        const value = {};
                        document.querySelectorAll('.take_resolution_member_check').forEach((el) => {
                            if (el.checked) {
                                const item = {
                                    fio: el.dataset.fio,
                                    email: el.dataset.email
                                };
                                value[el.dataset.userid] = item;
                            };
                        });
                        console.log(value)
                        if (Object.entries(value).length !== 0) {
                            const params = {
                                type: 'send_mail',
                                act_id: this.act.id,
                            };
                            const data = {
                                user_data: JSON.stringify({
                                    role: 1,
                                    members: value
                                })
                            };
                            console.log(data)
                            const url = this.convertUrl.pageUrl(this.url, params);
                            this.responce.setUrl = url;
                            const result = await this.responce.postData(data);
                            if (result.type == 'ok') {
                                this.actPageContent.alerts.setText = 'Запрос резолюции направлен!';
                                this.actPageContent.alerts.setSuccessBtnClass = 'take_resolution_close_btn';
                                this.actPageContent.alerts.sweetAlertSuccess();
                                this.actPageContent.alerts.sweetAlertSuccess();
                                if (document.querySelector('.take_resolution_close_btn')) {
                                    document.querySelector('.take_resolution_close_btn').addEventListener('click', () => {
                                        $('#take_resolution_modal').modal('hide');
                                    });
                                };
                            }
                        } else {
                            this.actPageContent.alerts.setText = result.text + '!';
                            this.actPageContent.alerts.sweetAlertError();
                        }
                    })
                }
            }


            useDiagram() {
                let grade = 0;
                Object.values(this.act.member_cnt_resolution).forEach((el) => {
                    grade += el;
                });
                const ctx = document.getElementById('kt_chartjs_3');

                // Define colors
                const primaryColor = KTUtil.getCssVariableValue('--kt-primary');
                const dangerColor = KTUtil.getCssVariableValue('--kt-danger');
                const successColor = KTUtil.getCssVariableValue('--kt-success');
                const warningColor = KTUtil.getCssVariableValue('--kt-warning');
                const infoColor = KTUtil.getCssVariableValue('--kt-info');

                // Define fonts
                const fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

                // Chart labels
                // const labels = ['выставлено оценок', 'ожидается оценка'];

                // Chart data
                const data = {
                    labels: ['выставлено оценок', 'ожидается оценка'],
                    datasets: [{
                        label: '# of Votes',
                        backgroundColor: [successColor, dangerColor],
                        data: [grade, this.act.count_order_diagram - grade],
                        borderWidth: 1
                    }],
                };

                // Chart config
                const config = {
                    type: 'pie',
                    data: data,
                    options: {
                        plugins: {
                            title: {
                                display: false,
                            },

                        },
                        responsive: true,
                    },
                    defaults: {
                        global: {
                            defaultFont: fontFamily
                        }
                    }
                };
                const myChart = new Chart(ctx, config);
            };

            completeAct() {
                if (document.getElementById('complete_act_btn')) {
                    document.getElementById('complete_act_btn').addEventListener('click', (e) => {
                        e.preventDefault();
                        if (this.act.orders) {
                            this.actPageContent.alerts.setText = 'После завершения проверки редактирование акта будет невозможным!'; //переформулировать про то, что и куда будет направлено
                            this.actPageContent.alerts.setConfirmBtnText = "Завершить проверку!";
                            this.actPageContent.alerts.setConfirmBtnClass = 'act_close_btn';
                            this.actPageContent.alerts.sweetAlertTwobtn();
                            document.querySelector('.act_close_btn').addEventListener('click', async () => {
                                const params = {
                                    type: 'close_act',
                                    act_id: this.act.id,
                                };
                                const url = this.convertUrl.pageUrl(this.url, params);
                                this.responce.setUrl = url;
                                const result = await this.responce.getData();
                                this.act.status = 0;
                                this.closeAct();
                                console.log(result)
                                if (result.type == "ok") {
                                    this.actPageContent.alerts.setText = result.text + '!';
                                    this.actPageContent.alerts.sweetAlertSuccess();
                                } else {
                                    this.actPageContent.alerts.setText = result.text + '!';
                                    this.actPageContent.alerts.sweetAlertError();
                                };
                            })
                        } else {
                            this.actPageContent.alerts.setText = 'Добавьте дела в акт!';
                            this.actPageContent.alerts.sweetAlertError();
                        };
                    });
                };
            };

            letterTermChange() {
                document.getElementById('letter_term_change_form').addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const date = {
                        checkdate_info: JSON.stringify({
                            checkdate_id: this.act.letter_checkdate[0].id,
                            allcheck_date: $('#allcheck_date_datapicker').val(),
                            note_date: $('#note_date_datapicker').val(),
                            reason: $('#letter_terns_comment').val(),
                            act_id: this.act.id,
                            letter_id: this.act.letter_id
                        })
                    };
                    const params = {
                        type: 'change_checkdate'
                    };
                    const url = this.convertUrl.pageUrl(this.url, params);
                    this.responce.setUrl = url;
                    const result = await this.responce.postData(date);
                    this.act.letter_checkdate[0].reason = JSON.parse(result)[0].reason;
                    this.act.letter_checkdate[0].allcheck_date = date.checkdate_info.allcheck_date;
                    this.act.letter_checkdate[0].note_date = date.checkdate_info.note_date;
                    this.actPageContent.setActInfo = this.act;
                    this.actPageContent.alerts.setText = 'Срок изменен!';
                    this.actPageContent.alerts.setSuccessBtnClass = 'terns_complete_btn';

                    this.actPageContent.alerts.sweetAlertSuccess();
                    if (document.querySelector('.terns_complete_btn')) {
                        document.querySelector('.terns_complete_btn').addEventListener('click', () => {

                            this.actPageContent.addLetterInfo();
                            $('#terns_modal').modal('hide');
                            this.actPageContent.cleaneTernsModal();
                        });
                    };
                });
            };

            startCheck() {
                if (document.getElementById('start_check_btn')) {
                    document.getElementById('start_check_btn').addEventListener('click', (e) => {
                        e.preventDefault();
                        this.actPageContent.alerts.setText = 'Уведомление о начале проверки будет направлено на почту начальнику отдела методической работы и секретарю!'
                        this.actPageContent.alerts.setConfirmBtnText = "Начать проверку!";
                        this.actPageContent.alerts.setConfirmBtnClass = 'сheck_start_btn';
                        this.actPageContent.alerts.sweetAlertTwobtn();
                        if (document.querySelector('.сheck_start_btn')) {
                            document.querySelector('.сheck_start_btn').addEventListener('click', async (e) => {
                                e.preventDefault();
                                const params = {
                                    type: 'send_mail',
                                    act_id: this.act.id
                                };
                                const date = {
                                    user_data: JSON.stringify({
                                        role: 5
                                    })
                                };
                                const url = this.convertUrl.pageUrl(this.url, params);
                                this.responce.setUrl = url;
                                const result = await this.responce.postData(date);
                                this.actPageContent.alerts.setText = `Уведомление о начале проверки направлено!`;
                                this.actPageContent.alerts.setSuccessBtnClass = 'check_start-complete_btn'
                                this.actPageContent.alerts.sweetAlertSuccess();
                            });
                        };
                    })
                }
            }
        };

        class ActPageContent {
            constructor() {
                this.template = new Template();
                this.alerts = new SweetAlerts();
                this.actInfo = null;
                this.comission = null;
                this.searchOrders = null;
                this.comissionTable = null;
                this.comissionEmailList = null;
                this.closeMenu = new Menu();
            };
            /**
             * @param {any} value
             */
            set setActInfo(value) {
                this.actInfo = value;
            };
            /**
             * @param {any} value
             */
            set setSearchOrders(value) {
                this.searchOrders = value;
            };
            /**
             * @param {any} value
             */
            set setComission(value) {
                this.comission = value;
            };
            /**
             * @param {any} value
             */
            set setComissionTable(value) {
                this.comissionTable = value;
            };
            /**
             * @param {any} value
             */
            set setComissionEmailList(value) {
                this.comissionEmailList = value;
            }

            closeOpenMenu() {
                this.closeMenu.setTime = 1;
                this.closeMenu.createMenu();
            };

            actLoad() {
                document.getElementById('act_page-content').classList.remove('d-none')
            };

            addActContent() {
                this.addActNumber(); //добавление номера акта
                this.addDepartmentName(); //добавление названия ведомства
                this.addActDate(); //добавление даты акта
                this.addLetterInfo() //добавление информациии
                this.closeOpenMenu();
            };

            addActNumber() {
                document.getElementById('act_number').textContent = this.actInfo.serial_number;
                document.getElementById('current_act_number').textContent = this.actInfo.serial_number;
            };

            addDepartmentName() {
                document.getElementById('act_department-name').textContent = this.actInfo.department_name;
            };

            addActDate() {
                document.getElementById('act_date').textContent = this.actInfo.act_date;
            };

            addLetterInfo() {
                document.getElementById('letter_number').textContent = this.actInfo.letter_name;
                document.getElementById('letter_date').textContent = this.actInfo.letter_date;
                document.getElementById('letter_allcheck').textContent = this.actInfo.letter_checkdate[0].allcheck_date;
                document.getElementById('letter_note_date').textContent = this.actInfo.letter_checkdate[0].note_date;
                this.addLetterReasonItem();
            };

            addLetterReasonItem() {
                const container = document.getElementById('letter_comment');
                container.innerHTML = '';
                if (this.actInfo.letter_checkdate[0].reason) {
                    const sourceStr = this.actInfo.letter_checkdate[0].reason;
                    const searchStr = 'Срок окончания проверки изменился';
                    const indexes = [...sourceStr.matchAll(new RegExp(searchStr, 'gi'))].map(a => a.index);
                    indexes.forEach((el, i) => {
                        const receivedStr = sourceStr.substring(el, indexes[i + 1]);
                        const item = this.createLetterReasonItem(receivedStr);
                        container.append(item);
                    });
                };
            };

            createLetterReasonItem(el) {
                const itemInitial = `<li class="d-flex align-items-center py-2">
                                                            <span class="bullet me-5"></span> ${el}
                                                        </li>`;
                this.template.setTemplate = itemInitial;
                const itemTemplate = this.template.createFromTemplate();
                return itemTemplate;
            };

            cleaneTernsModal() {
                $('#letter_terns_category').val(null).trigger('change');
                $('#letter_terns_comment').val(null).trigger('change');
            };

            switchTabsHideBtn() {

                const tabs = document.querySelectorAll('a[data-bs-toggle="tab"]');
                tabs.forEach((el) => {
                    el.addEventListener('shown.bs.tab', (event) => {
                        if (el.id == 'act_comission-tabs') {
                            if (document.getElementById('act_comission-change-btn')) {
                                document.getElementById('act_comission-change-btn').style.display = 'block';
                            }
                            if (document.getElementById('act_orders-add-btn')) {
                                document.getElementById('act_orders-add-btn').style.display = 'none';
                            }

                            if (document.getElementById('letter_change_btn')) {
                                document.getElementById('letter_change_btn').style.display = 'none';
                            }
                        } else if (el.id == 'act_orders-tabs') {
                            if (document.getElementById('act_comission-change-btn')) {
                                document.getElementById('act_comission-change-btn').style.display = 'none';
                            }
                            if (document.getElementById('act_orders-add-btn')) {
                                document.getElementById('act_orders-add-btn').style.display = 'block';
                            };
                            if (document.getElementById('letter_change_btn')) {
                                document.getElementById('letter_change_btn').style.display = 'none';
                            }
                        } else if (el.id == 'act_terms-tabs') {
                            if (document.getElementById('act_comission-change-btn')) {
                                document.getElementById('act_comission-change-btn').style.display = 'none';
                            }
                            if (document.getElementById('act_orders-add-btn')) {
                                document.getElementById('act_orders-add-btn').style.display = 'none';
                            }
                            if (document.getElementById('letter_change_btn')) {
                                document.getElementById('letter_change_btn').style.display = 'block';
                            }
                        } else if (el.id == 'act_documents-tabs') {
                            if (document.getElementById('act_comission-change-btn')) {
                                document.getElementById('act_comission-change-btn').style.display = 'none';
                            }
                            if (document.getElementById('act_orders-add-btn')) {
                                document.getElementById('act_orders-add-btn').style.display = 'none';
                            }
                            if (document.getElementById('letter_change_btn')) {
                                document.getElementById('letter_change_btn').style.display = 'none';
                            }
                        };
                    });
                });

            };

            addOrdersList() {
                if (this.actInfo.orders) {
                    const iconNoneCritical = `  <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg style="transform: rotate(45deg);" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                                                                                </svg> </span>`;
                    const iconCritical = `<span class="svg-icon svg-icon-muted svg-icon-2hx text-danger"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"/>
<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
</svg>
</span>`;
                    const successBadge = `badge-success`;
                    const dangerBadge = `badge-danger`;
                    const warningBadge = 'badge-warning';
                    const successLightBadge = `badge-light-success`;
                    const primaryLightBadge = `badge-light-primary`;
                    document.getElementById('orders_table_body').innerHTML = '';
                    let orders = this.actInfo.orders;
                    orders.forEach((el) => {
                        if (el.pk_pvd_number == "0") { //TODO костыль на номер пкпвд- приходит "0"
                            el.pk_pvd_number = '';
                        };
                        if (el.critical) {
                            el.icon = iconCritical;
                        } else {
                            el.icon = iconNoneCritical;
                        };
                        if (el.empty_flag == "в работе") {
                            el.empty_badge = successLightBadge;
                        } else if (el.empty_flag == "новое") {
                            el.empty_badge = primaryLightBadge;
                        };
                        if (el.resolution == "виновен") {
                            el.resolution_badge = dangerBadge;
                        } else if (el.resolution == "не виновен") {
                            el.resolution_badge = successBadge;
                        } else if (el.resolution == "нет данных") {
                            el.resolution_badge = warningBadge;
                        };

                        if (el.current_user_resolution) {
                            if (el.current_user_resolution.member_resolution == "усмотрена ошибка") {
                                el.current_user_resolution.badge = dangerBadge;
                            } else if (el.current_user_resolution.member_resolution == "ошибка не усмотрена") {
                                el.current_user_resolution.badge = successBadge;
                            } else if (el.current_user_resolution.member_resolution = "резолюция не внесена") {
                                el.current_user_resolution.badge = warningBadge;
                            };
                        };
                        const actsItem = this.createOrderItem(el);
                        document.getElementById('orders_table_body').append(actsItem);
                    });
                } else {
                    document.getElementById('orders_table_body').innerHTML = '';
                };
            };

            createOrderItem(el) {
                const itemInitial = `<tr class="text-hover-primary">
                                                                        <td><span class="badge ${el.empty_badge}">${el.empty_flag}</span></td>
                                                                        <td style="max-width: 250px;">АИС: ${el.order_number}
                                                                            <br>
                                                                            ПКПВД: ${el.pk_pvd_number}
                                                                        </td>
                                                                        <td>${el.order_date}</td>
                                                                        <td>${el.mfc_name}</td>
                                                                        <td>${el.user_display_name}</td>
                                                                        <td><span class="badge ${el.current_user_resolution.badge}">${el.current_user_resolution.member_resolution}</span></td>
                                                                        <td><span class="badge ${el.resolution_badge}">${el.resolution}</span></td>
                                                                        <td>${el.icon}</td>
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
                                                                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                                                            Действия
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--end::Heading-->
                                                                                    <!--begin::Menu item-->
                                                                                    <div class="menu-item px-3">
                                                                                        <a href="./servcheck-order-${el.id}" class="menu-link px-3">
                                                                                           Открыть дело
                                                                                        </a>
                                                                                    </div>
                                                                                    <!--end::Menu item-->
                                                                                    <!--begin::Menu item-->
                                                                                    <?php $role = 'sc_admin';
                                                                                    if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
                                                                                        echo ' <div class="menu-item px-3">
                                    <a class="menu-link px-3 order-delete_btn" data-del-id="${el.id}">
                                        Удалить дело
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

            menuActive() {
                KTMenu.createInstances();
            };

            createSearchOrders(el) {
                const itemInitial = ` <tr class="fs-7 orders-search_item" >
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input selected_search_order_check" type="checkbox" value="" id="flexCheckDefault" data-order-number="${el.order_number}" />
                                                                    </div>
                                                                </td>
                                                                <td>${el.order_number}<br>
                                                                    <span style="white-space:nowrap">${el.pk_pvd_number}</span>
                                                                </td>
                                                                <td>${el.requester_fio}</td>
                                                                <td>${el.mfc_name}</td>
                                                                <td>${el.order_date}</td>

                                                            </tr>`;
                this.template.setTemplate = itemInitial;
                const itemTemplate = this.template.createFromTemplate();
                return itemTemplate;
            };

            createSearchNoResultText(el) {
                const itemInitial = `<div class="text-danger">${el.text}</div>`;
                this.template.setTemplate = itemInitial;
                const itemTemplate = this.template.createFromTemplate();
                return itemTemplate;
            };

            addSearchOrdersList() {
                const container = document.getElementById('search-orders_list');

                container.innerHTML = '';
                document.getElementById('search-orders_thead').style.display = 'table-row';
                if (this.searchOrders.type !== "error") {
                    this.searchOrders.forEach((el) => {
                        if (!el.pk_pvd_number) { //TODO костыль на номер пкпвд- приходит "0"
                            el.pk_pvd_number = '';
                        };
                        const order = this.createSearchOrders(el);
                        container.append(order);
                    });
                } else {
                    const dangertext = this.createSearchNoResultText(this.searchOrders)
                    container.append(dangertext);
                    document.getElementById('search-orders_thead').style.display = 'none';
                };
            };

            loaderActive() {
                const button = document.getElementById('orders-search_btn');
                button.setAttribute("data-kt-indicator", "on");
                button.disabled = true;
            };

            cleaneOrdersSearchInput() {
                document.getElementById('orders-search-cleane_btn').addEventListener('click', () => {
                    document.getElementById('search-orders_form').reset();
                });
            };

            cleaneOrdersSearchModal() {
                document.getElementById('search-orders_form').reset();
                document.getElementById('search-orders_list').innerHTML = '';
                document.getElementById('search-orders_thead').display = 'none';
            };

            addMembersList() {
                this.comission.forEach((el) => {
                    const option = this.createOption(el.display_name, el.id);
                    document.getElementById('comission_list_president').add(option);
                });
                this.comission.forEach((el) => {
                    const option = this.createOption(el.display_name, el.id);
                    document.getElementById('comission_list_secretary').add(option);
                });
                this.comission.forEach((el) => {
                    const option = this.createOption(el.display_name, el.id);
                    document.getElementById('comission_list_members').add(option);
                });
            };

            createOption(name, id) {
                const optionInitial = `
                <option value="${id}">${name}</option>`;
                this.template.setTemplate = optionInitial;
                const optionTemplate = this.template.createFromTemplate();
                return optionTemplate;
            };

            selectComission() {
                $('#comission_list_president').val(this.actInfo.members.president).trigger('change');
                $('#comission_list_secretary').val(this.actInfo.members.secretary).trigger('change');
                $('#comission_list_members').val(this.actInfo.members.member).trigger('change');
            };

            createComissionItem(el, role) {
                const itemInitial = `  <tr class="comission_item">
                                                                            <td>
                                                                                <div class="symbol symbol-50px">
                                                                                    <img src="m_assets/service_storage/userimg/${el.uuid}.png" alt="image">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="text-dark fw-bold mb-1 fs-6">${el.display_name}</div>
                                                                                <span class="text-muted fw-semibold d-block fs-7">${role}</span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="text-muted fw-semibold d-block fs-7">
                                                                                   ${el.department}
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="text-muted fw-semibold d-block fs-7">
                                                                                   ${el.title}
                                                                                </span>
                                                                            </td>
                                                                            <td class="text-success">${this.actInfo.member_cnt_resolution[el.id]}/${this.actInfo.count_order} дел</td>
                                                                        </tr>
                `;
                this.template.setTemplate = itemInitial;
                const itemTemplate = this.template.createFromTemplate();
                return itemTemplate;
            };

            addComissionList() {
                const container = document.getElementById('comission_list')
                container.innerHTML = '';
                if (this.comissionTable.members) {
                    this.comissionTable.members.forEach((el) => {
                        const item = this.createComissionItem(el, 'член комиссии');
                        container.append(item);
                    });
                };
                if (this.comissionTable.secretary) {
                    const item = this.createComissionItem(this.comissionTable.secretary, 'секретарь');
                    container.prepend(item);
                };
                if (this.comissionTable.president) {
                    const item = this.createComissionItem(this.comissionTable.president, 'председатель');
                    container.prepend(item);
                };
            };

            selectsParentsModal() {
                $("#letter_terns_category").select2({
                    tags: true,
                    dropdownParent: $("#terns_modal")
                });

                $("#comission_list_president, #comission_list_secretary").select2({
                    tags: true,
                    dropdownParent: $("#kt_modal_2")
                });
            };
            orderSearchModalOpen() {
                if (document.getElementById('act_orders-add-btn')) {
                    document.getElementById('act_orders-add-btn').addEventListener('click', (e) => {
                        e.preventDefault();
                        document.getElementById('order-search_input').value = '';
                        document.getElementById('search-orders_danger-text').textContent = '';
                        document.getElementById('old_period_check').setAttribute('checked', 'checked');
                        document.getElementById('pkpvd_search_check').removeAttribute('checked');
                        document.getElementById('search-orders_thead').style.display = 'none';
                        document.getElementById('search-orders_list').innerHTML = '';
                        $('#orders-search_modal').modal('show');
                    });
                };
            };

            closeActContent() {
                if (document.getElementById('start_check_btn')) {
                    document.getElementById('start_check_btn').style.display = 'none';
                };
                if (document.getElementById('complete_act_btn')) {
                    document.getElementById('complete_act_btn').style.display = 'none';
                };
                if (document.getElementById('take-resolution_btn')) {
                    document.getElementById('take-resolution_btn').style.display = 'none';
                };
                // if (document.getElementById('close_check_btn')) {
                //     document.getElementById('close_check_btn').style.display = 'none';
                // };
                if (document.querySelector('.order-delete_btn')) {
                    document.querySelectorAll('.order-delete_btn').forEach((el) => {
                        el.style.display = 'none';
                    });
                };
                if (document.getElementById('act_orders-add-btn')) {
                    document.getElementById('act_orders-add-btn').style.visibility = 'hidden';
                };
                if (document.getElementById('act_comission-change-btn')) {
                    document.getElementById('act_comission-change-btn').style.visibility = 'hidden';
                };
                if (document.getElementById('letter_change_btn')) {
                    document.getElementById('letter_change_btn').style.visibility = 'hidden';
                };
            };

            addComissionEmailList() {
                const container = document.getElementById('take_resolution_container');
                container.innerHTML = '';
                if (this.comissionEmailList) {
                    this.comissionEmailList.forEach((el) => {
                        const item = this.createComissionEmailItem(el);
                        container.append(item);
                    });
                };
            };

            createComissionEmailItem(el) {
                const itemInitial = `
<tr class="comission_item">
                                                    <td> <input class="form-check-input take_resolution_member_check" type="checkbox" value="" id="flexCheckDefault" checked data-fio="${el.user_display_name}" data-email="${el.email}" data-userid="${el.cpgu_user}"/>
                                                    </td>
                                                    <td>
                                                        <div class="text-dark fw-bold mb-1 fs-6">${el.user_display_name}</div>
                                                        <span class="text-muted fw-semibold d-block fs-7">${el.role}</span>
                                                    </td>                                                

                                                    <td>
                                                        <span class="text-muted fw-semibold d-block fs-7">
                                                           ${el.position}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="text-muted fw-semibold d-block fs-7">
                                                            ${el.email}
                                                        </span>
                                                    </td>
                                                </tr>
                                                `;
                this.template.setTemplate = itemInitial;
                const itemTemplate = this.template.createFromTemplate();
                return itemTemplate;
            }

            addFilesList() {
                const container = document.getElementById('files_container');
                container.innerHTML = '';
                if (this.actInfo.files) {
                    const files = JSON.parse(this.actInfo.files);
                    console.log(files)
                    if (files.length > 0) {
                        files.forEach((el) => {
                            console.log(el);
                            const item = this.createFilesItem(el);
                            container.append(item);
                        });
                    };
                }

            };

            createFilesItem(el) {
                const itemInitial = `<tr style="">
                                                                            <td style="width: 80%">
                                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
                                                                                        <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
                                                                                        <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
                                                                                        <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
                                                                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                                                                                    </svg>
                                                                                </span>
                                                                                <a class="text-gray-600 fw-bold fs-5 p-5" style="margin-top: 5px;">${el.type} №${el.source_name}</a>
                                                                            </td>

                                                                            <td style="width: 10%;"><a class="btn btn-active-icon-danger btn-text-danger p-0 delete_file" data-uuid="${el.file_uuid}" data-trigger="hover" data-bs-placement="top" title="Удалить файл"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-07-21-074234/core/html/src/media/icons/duotune/arrows/arr097.svg-->
                                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect x="9.39844" y="20.7144" width="16" height="2.66667" rx="1.33333" transform="rotate(-45 9.39844 20.7144)" fill="currentColor" />
                                                                                            <rect x="11.2852" y="9.40039" width="16" height="2.66667" rx="1.33333" transform="rotate(45 11.2852 9.40039)" fill="currentColor" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <!--end::Svg Icon-->
                                                                                </a></td>
                                                                            <td style="width: 10%;"><a href="${el.link}" class="btn btn-active-icon-warning btn-text-warning p-0" data-trigger="hover" data-bs-placement="top" title="Скачать файл"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-07-21-074234/core/html/src/media/icons/duotune/arrows/arr091.svg-->
                                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(0 -1 -1 0 12.75 19.75)" fill="currentColor" />
                                                                                            <path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z" fill="currentColor" />
                                                                                            <path opacity="0.3" d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z" fill="currentColor" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <!--end::Svg Icon-->
                                                                                </a></td>
                                                                        </tr>`;
                this.template.setTemplate = itemInitial;
                const itemTemplate = this.template.createFromTemplate();
                return itemTemplate;
            }

            activeDataPicker() {
                $(`#note_date_datapicker`).daterangepicker({
                    'viewMode': "calendar",
                    "autoUpdateInput": true,
                    'singleDatePicker': true,
                    'showDropdowns': true,
                    'autoApply': true,
                    'parentEl': '#terns_modal',
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
                });


                $(`#allcheck_date_datapicker`).daterangepicker({
                    'viewMode': "calendar",
                    "autoUpdateInput": true,
                    'singleDatePicker': true,
                    'showDropdowns': true,
                    'autoApply': true,
                    'parentEl': '#terns_modal',
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
                });
            };


        };

        document.addEventListener("DOMContentLoaded", () => {
            const servCheckActApp = new ServCheckActApp();
            servCheckActApp.createServCheckActApp();
        });



        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
    </script>
    <!--end::jsCustom js by this page-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>