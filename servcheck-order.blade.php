<?php
/* Настройки текущей страницы --->  */ $title = 'Сервис проверок';
$role = 'guest';
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
	<style>
		body {
			font-weight: 500;
			color: #5E6278;
		}

		.mis_modal_item:last-child .separator-dashed {
			border: none;
		}

		.select2-close-mask {
			z-index: 2099;
		}

		.select2-dropdown {
			z-index: 3051;
		}

		.aside {
			width: 0;
		}
	</style>
	<!--end::cssCustom js by this page-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed fs-6">
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
						<div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

							<!--begin::Page title-->
							<div id="order" class="page-title d-flex flex-column me-3" style="display: none;">
								<!--begin::Title-->
								<h1 class="d-flex text-dark fw-bold my-1 fs-3">
									Дело №
									<span id="order_title" style="margin-left: 5px;"></span>
								</h1>
								<!--end::Title-->


								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 my-1">
									<!--begin::Item-->
									<li class="breadcrumb-item text-gray-600">
										<a href="./servcheck" class="text-gray-600 text-hover-primary">
											<span class="svg-icon svg-icon-muted svg-icon-1hx"><svg style="transform: translateY(-2px);" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor" />
												</svg>
											</span> На главную </a>
									</li>
									<!--end::Item-->
									<li class="breadcrumb-item text-gray-600">
										<a id="order_breadscrumbs_act_href" href="" class="text-gray-600 text-hover-primary"> Акт №
											<span id="order_breadscrumbs_act" class="svg-icon svg-icon-muted svg-icon-1hx" style="margin-bottom: 3px;">
											</span>
										</a>
									</li>
									<!--begin::Item-->
									<li class="breadcrumb-item text-gray-500">
										Дело № <span id="order_breadscrumbs_order" style="margin-left: 5px;"></span>
									</li>
									<!--end::Item-->
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title-->


							<!--begin::Actions-->
							<div class="d-flex align-items-center py-2 py-md-1">
								<!--begin::Wrapper-->

								<div class="me-3 d-flex" style="align-items: center;">
									<div id="personal_resolution">
										<!--begin::Title-->
										<h1 class="d-flex text-dark fw-bold fs-3 me-3" style="margin: 0">
											Резолюция: <span id="resolution_text" style="margin-left: 10px;"></span>
											<span style="margin-left: 5px; color: #ffc700"></span>
										</h1>
									</div>
									<a id="select-critycal_btn" href="" class="btn btn-light-danger fw-bold me-5" style="display: none;">Служебная проверка</a>
									<!--begin::Menu-->
									<a id="add-resolution_btn" href="" class="btn btn-light-info fw-bold" data-bs-toggle="modal" data-bs-target="#resolution_modal" style="display: none;">
										Внести резолюцию
									</a>
								</div>
								<!--end::Wrapper-->
								<a id="next-order_btn" href="" class="btn btn-light-primary fw-bold me-5" style="display: none;">
									Следующее дело
								</a>
								<!--begin::Button-->
								<a id="act_back_btn" href="" class="btn btn-primary fw-bold">
									Назад </a>
								<!--end::Button-->
							</div>
							<!--end::Actions-->
						</div>

						<div class="row g-5 g-xl-8 mb-9">
							<div class="col-xl-4">
								<!--begin::Summary-->
								<div class="card card-flush h-lg-100">
									<!--begin::Card header-->
									<div class="card-header ">
										<!--begin::Card title-->
										<div class="card-title flex-column">
											<h3 class="fw-bold">Общая информация</h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--end::Card header-->

									<!--begin::Card body-->
									<div class="card-body p-6 " style="padding-top: 0!Important;">
										<div class="d-flex">
											<div><span class="svg-icon svg-icon-muted svg-icon-1hx me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
														<rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
														<rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
														<rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
														<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
													</svg>
												</span></div>
											<p> <span class="text-dark fw-bold fs-6 me-2"> Услуга:</span><span id="service_title"></span>
											</p>
											<!-- <div class="d-flex justify-content-between">-->
										</div>
										<div class="d-flex">
											<div><span class="svg-icon svg-icon-muted svg-icon-1hx me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor" />
														<path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor" />
													</svg>
												</span>
											</div>
											<p><span class="text-dark fw-bold fs-6 me-2">МФЦ:</span><span id="mfc_name"></span>
											</p>
										</div>
										<div class="d-flex">
											<div>
												<span class="svg-icon svg-icon-muted svg-icon-1hx me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
														<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
														<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
													</svg>
												</span>
											</div>
											<p> <span class="text-dark fw-bold fs-6 me-2">Дата:</span> <span id="order_date"></span></p>
										</div>
										<div class="d-flex">
											<div><span class="svg-icon svg-icon-muted svg-icon-1hx me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
														<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
													</svg>
												</span></div>
											<p> <span class="text-dark fw-bold fs-6 me-2">ПКПВД №:</span> <span id="pkpvd_number"></span>
											</p>
										</div>
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Summary-->
							</div>
							<div class="col-xl-3">
								<!--begin::Summary-->
								<div class="card card-flush h-lg-100">
									<!--begin::Card header-->
									<div class="card-header ">
										<!--begin::Card title-->
										<div class="card-title flex-column">
											<h3 class="fw-bold mb-1">Сотрудник</h3>
										</div>
										<!--end::Card title-->

										<?php
										$role = 'sc_admin';
										if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
											echo ' <div class="card-toolbar">
											<a id="edit_employer_btn" href="" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#emp_modal">Редактировать</a>
										</div>';
										}
										?>
										<!--begin::Card toolbar-->

										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->

									<!--begin::Card body-->
									<div class="card-body p-6 " style="padding-top: 0!Important;">

										<div class="d-flex">
											<div><span class="svg-icon svg-icon-muted svg-icon-1hx me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor" />
														<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor" />
													</svg>
												</span></div>
											<p> <span class="text-dark fw-bold fs-6 me-2">Ф.И.О.:</span><span id="user_display_name"></span></p>
										</div>
										<div class="d-flex">
											<div><span class="svg-icon svg-icon-muted svg-icon-1hx me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
														<path d="M12.0006 11.1542C13.1434 11.1542 14.0777 10.22 14.0777 9.0771C14.0777 7.93424 13.1434 7 12.0006 7C10.8577 7 9.92348 7.93424 9.92348 9.0771C9.92348 10.22 10.8577 11.1542 12.0006 11.1542Z" fill="currentColor" />
														<path d="M15.5652 13.814C15.5108 13.6779 15.4382 13.551 15.3566 13.4331C14.9393 12.8163 14.2954 12.4081 13.5697 12.3083C13.479 12.2993 13.3793 12.3174 13.3067 12.3718C12.9257 12.653 12.4722 12.7981 12.0006 12.7981C11.5289 12.7981 11.0754 12.653 10.6944 12.3718C10.6219 12.3174 10.5221 12.2902 10.4314 12.3083C9.70578 12.4081 9.05272 12.8163 8.64456 13.4331C8.56293 13.551 8.49036 13.687 8.43595 13.814C8.40875 13.8684 8.41781 13.9319 8.44502 13.9864C8.51759 14.1133 8.60828 14.2403 8.68991 14.3492C8.81689 14.5215 8.95295 14.6757 9.10715 14.8208C9.23413 14.9478 9.37925 15.0657 9.52439 15.1836C10.2409 15.7188 11.1026 15.9999 11.9915 15.9999C12.8804 15.9999 13.7421 15.7188 14.4586 15.1836C14.6038 15.0748 14.7489 14.9478 14.8759 14.8208C15.021 14.6757 15.1661 14.5215 15.2931 14.3492C15.3838 14.2312 15.4655 14.1133 15.538 13.9864C15.5833 13.9319 15.5924 13.8684 15.5652 13.814Z" fill="currentColor" />
													</svg>
												</span></div>
											<p><span class="text-dark fw-bold fs-6 me-2">Должность:</span><span id="user_position"></span></p>
										</div>

									</div>
									<!--end::Summary-->
								</div>
							</div>
							<div class="col-xl-5">
								<div class="card card-flush h-lg-100">
									<div class="card-header ">
										<div class="card-title flex-column">
											<h3 class="fw-bold mb-1">Данные об ошибке</h3>
										</div>
										<div class="card-toolbar">

											<?php
											$role = 'sc_admin';
											if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
												echo ' <a id="edit_mistake_btn" style="" href="" class="btn btn-light-primary btn-sm ms-3" data-bs-toggle="modal" data-bs-target="#add_mistakes_modal">Редактировать</a>';
											}
											?>

										</div>
									</div>
									<div class="card-body p-6 " style="padding-top: 0!Important;">
										<div id="order_mistakes_list">
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="row g-5 g-xl-8"> -->
							<div class="col-xl-4">
								<!--begin::Summary-->
								<div class="card card-flush h-lg-100">
									<!--begin::Card header-->
									<div class="card-header ">
										<!--begin::Card title-->
										<div class="card-title flex-column">
											<h3 class="fw-bold mb-1">Объяснительная</h3>
										</div>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<?php
											$role = 'sc_admin';
											if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
												echo ' 
									<button id="modal_note_ask_btn" href="" class="btn btn-light-info btn-sm">Запросить</button>
								    ';
											}
											?>
											<a id="employee_note_add_btn" href="" class="btn btn-light-primary btn-sm ms-3" style="display: none;">Добавить</a>
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div id="employee_note" class="card-body p-6 " style="padding-top: 0!Important;">

									</div>
									<!--end::Card body-->
								</div>
								<!--end::Summary-->
							</div>
							<div class="col-xl-4">
								<!--begin::Summary-->
								<div class="card card-flush h-lg-100">
									<!--begin::Card header-->
									<div class="card-header ">
										<!--begin::Card title-->
										<div class="card-title flex-column">
											<h3 class="fw-bold mb-1">Пояснительная</h3>
										</div>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<?php
											$role = 'sc_admin';
											if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
												echo ' <button id="comment_note_request_btn" href="" class="btn btn-light-info btn-sm">Запросить </button>
									';
											}
											?>
											<a id="comment_note_add_btn" href="" class="btn btn-light-primary btn-sm ms-3" style="display:none" data-bs-toggle="modal" data-bs-target="#modal_comment_note_add">Добавить</a>
											<!-- <a id="comment_note_edit_btn" href="" class="btn btn-light-primary btn-sm ms-3" style="display: none;">Редактировать </a> -->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div id="modal_comment_body" class="card-body p-6 " style="padding-top: 0!Important;">
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Summary-->
							</div>
							<div class="col-xl-4">
								<!--begin::Summary-->
								<div class="card card-flush h-lg-100">
									<!--begin::Card header-->
									<div class="card-header ">
										<!--begin::Card title-->
										<div class="card-title flex-column">
											<h3 class="fw-bold mb-1">Примечания</h3>
										</div>
										<!--end::Card title-->

										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<?php
											$role = 'sc_admin';
											if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
												echo ' 
									<a id="description_note_edit_btn" href="" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_description_note_edit">Редактировать </a>';
											}
											?>

										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->

									<!--begin::Card body-->
									<div id="description" class="card-body p-6 " style="padding-top: 0!Important;">
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Summary-->
							</div>
							<div class="col-xl-4">
								<!--begin::Summary-->
								<div class="card card-flush h-lg-100">
									<!--begin::Card header-->
									<div class="card-header ">
										<!--begin::Card title-->
										<div class="card-title flex-column">
											<h3 class="fw-bold mb-1">Комментарии по делу из АИС</h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body comments_card scroll p-6" style="max-height: 30vh; padding-top: 0!Important;">
										<div id="comments_accordion_body" class="accordion-body">
										</div>
									</div>
									<!--end::Card body-->
									<div class="card-footer" style="height: 1.5rem; padding: 0;"></div>
								</div>
							</div>

							<div class="col-xl-8">
								<!--begin::Summary-->
								<div class="card card-flush h-lg-100">
									<!--begin::Card header-->
									<div class="card-header ">
										<!--begin::Card title-->
										<div class="card-title flex-column">
											<h3 class="fw-bold mb-1">Методические рекомендации</h3>
										</div>
										<!--end::Card title-->

										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<?php
											$role = 'sc_admin';
											if (strripos($_SESSION[env('SESSION_NAME')]['extended']['roles'], '"' . $role . '"') != false) {
												echo ' 
									<button id="recommend_modal_send_btn" href="" class="btn btn-light-info btn-sm">Отправить</button>
											<a id="recommend_modal_open_btn" href="" class="btn btn-light-primary btn-sm ms-3">Редактировать</a>';
											}
											?>

										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->

									<!--begin::Card body-->
									<div class="card-body p-6 " style="padding-top: 0!Important;">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr class="fw-bold fs-6 text-gray-800">
														<th>Ошибка</th>

														<th>Методические рекомендации</th>

													</tr>
												</thead>
												<tbody id="recommends_table_body">

												</tbody>
											</table>
										</div>
									</div>
									<div class="modal fade" tabindex="-1" id="modal_note_edit">
										<div class="modal-dialog" style="min-width: 60vw; min-height: 60vh">
											<div class="modal-content">
												<div class="modal-header">
													<h3 id="edit_title" class="modal-title">Объяснительная</h3>
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div class="modal-body">
													<div id="quill_employee_note" name="quill_employee_note" class="mb-6"></div>
												</div>
												<div class="modal-footer">
													<button id="modal_note_edit_save_btn" type="button" class="btn btn-primary" data-index="">Сохранить изменения</button>
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
												</div>
											</div>
										</div>
										<!--end::Card body-->
									</div>

									<div class="modal fade" tabindex="-1" id="modal_add_note">
										<div class="modal-dialog" style="min-width: 60vw; min-height: 60vh">
											<div class="modal-content">
												<div class="modal-header">
													<h3 id="add_title" class="modal-title">Объяснительная</h3>
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div class="modal-body">
													<div id="quill_add_employee_note" name="quill_add_employee_note" class="mb-6"></div>

												</div>
												<div class="modal-footer">
													<button id="modal_add_note_save_btn" type="button" class="btn btn-primary">Сохранить изменения</button>
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
												</div>
											</div>
										</div>
										<!--end::Card body-->
									</div>
									<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
											Launch demo modal
										</button> -->

									<div class="modal fade" tabindex="-1" id="resolution_modal">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Внесите резолюцию</h3>

													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div class="modal-body">
													<select id="resolution_category" class="form-select comission_list" data-control="select2" data-placeholder="Внесите резолюцию по делу">
														<option></option>
														<option value="2">Усмотрена ошибка</option>
														<option value="1">Ошибка не усмотрена</option>
													</select>
												</div>

												<div class="modal-footer">
													<button id="add-resolution" type="button" class="btn btn-primary">Сохранить изменения</button>
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>

												</div>
											</div>
										</div>
									</div>
									<!-- <button type="button" class="btn btn-primary" >
											Launch demo modal
										</button> -->

									<div class="modal fade" tabindex="-1" id="emp_modal">
										<div class="modal-dialog modal-dialog-scrollable" style="min-width: 40vw;">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Сотрудник, совершивший ошибку</h3>
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>
												<div class="modal-body">
													<div class="card-body py-3">
														<form id="search-emps_form">
															<div class="d-flex align-items-center">
																<!--begin::Input group-->
																<div class="position-relative w-100 me-md-2" style="flex: 1 1 70%">
																	<input id="emps-search_input" type="text" class="form-control form-control-solid ps-10 " name="search" value="" placeholder="Введите Ф.И.О сотрудника">
																	<span class="svg-icon svg-icon-muted svg-icon-1hx position-absolute top-50 translate-middle-y ms-4"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
																			<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
																		</svg>
																	</span>
																	<span id="emps-search-cleane_btn" class="svg-icon svg-icon-muted svg-icon-1hx position-absolute top-50 translate-middle-y end-0 me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="currentColor" />
																			<path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="currentColor" />
																		</svg>
																	</span>
																</div>
																<!--end::Input group-->
																<!--begin:Action-->
																<button id="emps-search_btn" type="submit" class="btn btn-primary w-100" id="kt_button_1" style="flex: 1 1 20%">
																	<span class="indicator-label">
																		Поиск
																	</span>
																	<span class="indicator-progress">
																		Идет поиск...<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
																	</span>
																</button>
																<!--end:Action-->
															</div>
														</form>
														<div id="emps-search-danger-text" class="text-danger mt-3"></div>
														<div class="table-responsive">
															<table class="table table-bordered">
																<tbody id="search-emps_list">
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button id="emp_add_btn" type="button" class="btn btn-primary">Сохранить изменения</button>
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>

												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" tabindex="-1" id="add_mistakes_modal">
										<div class="modal-dialog" style="min-width: 60vw;">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Данные об ошибках</h3>

													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div class="modal-body">
													<div class="select_container comission_select mb-3" style="flex: 1 1 30%;">
														<label for="" class="form-label">Категория ошибки</label>
														<select id="mistakes_category" class="form-select comission_list" data-control="select2" data-placeholder="Выберите категорию ошибки">
															<option></option>
														</select>
													</div>
													<div id="mistakes_container" style="display:none;">
														<div class="select_container comission_select mb-3" style="flex: 1 1 30%;">
															<label for="" class="form-label comission_list">Ошибка</label>
															<select id="mistakes" class="form-select mistakes-select" data-control="select2" data-placeholder="Выберите ошибку">
																<option></option>
															</select>
														</div>
														<div class="mb-3" style="display:none;" id="new-mistakes_container">
															<label for="" class="form-label">Иная ошибка</label>
															<div class="d-flex">
																<div class="" style="width:100%; margin-right: 30px;"> <input id="new-mistakes_input" type="text" class="form-control" placeholder="Введите текст ошибки"></div>

															</div>
														</div>
													</div>
													<button id="add-mistakes_btn" type="button" class="btn btn-primary w-100 mb-3" disabled>Добавить</button>
													<div id="mistakes_modal_list" class="mt-5">

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
													</div>
												</div>
											</div>
										</div>
										<!--end::Summary-->
									</div>

									<div class="modal fade" tabindex="-1" id="modal_mistakes_note">
										<div class="modal-dialog" style="min-width: 60vw; min-height: 60vh">
											<div class="modal-content">
												<div class="modal-header">
													<h3 id="edit_mistake_title" class="modal-title">Изменить текст и категорию ошибки</h3>
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>
												<div class="modal-body">
													<div class="select_container mistakes_select mb-3" style="flex: 1 1 30%;">
														<label for="" class="form-label">Категория ошибки</label>
														<select id="mistakes_note_category" class="form-select mistakes_list_select" data-control="select2" data-placeholder="Выберите категорию ошибки">
														</select>
													</div>
													<label for="" class="form-label">Текст ошибки</label>
													<div id="quill_mistake_note" name="quill_mistake_note" class="mb-6"></div>
												</div>
												<div class="modal-footer">
													<button id="modal_mistake_note_save_btn" type="button" class="btn btn-primary">Сохранить изменения</button>
													<button id="modal_mistake_note_close_btn" type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>

												</div>
											</div>
										</div>
										<!--end::Card body-->
									</div>

									<div class="modal fade" tabindex="-1" id="select-critical_modal">
										<div class="modal-dialog" style="max-width: 40vw;">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Служебная проверка</h3>

													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div id="select-critical_modal_body" class="modal-body">
													<div class="table-responsive">
														<table class="table table-bordered">
															<thead>

															</thead>
															<tbody id="select-critical_modal_list">

															</tbody>
														</table>
													</div>
												</div>

												<div class="modal-footer">
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
													<button id="select-critical_modal_save_btn" type="button" class="btn btn-danger">Требуется служебная проверка</button>
												</div>
											</div>
										</div>
									</div>
									<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#recommend_modal">
											Launch demo modal
										</button> -->

									<div class="modal fade" tabindex="-1" id="recommend_modal">
										<div class="modal-dialog" style="max-width: 60vw;">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Методические рекомендации</h3>

													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div class="modal-body">
													<select id="recommend_modal_select" class="form-select mb-5" data-control="select2" data-placeholder="Выберите ошибку">
														<option></option>
													</select>
													<div class="table-responsive">
														<table id="recommend_modal_table" class="table table-bordered" style="display: none;">
															<thead>

															</thead>
															<tbody id="recommend_modal_table_body">

															</tbody>
														</table>
													</div>

												</div>

												<div class="modal-footer">
													<button id="recommend_modal_save_btn" type="button" class="btn btn-primary">Сохранить изменения</button>
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>

												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" tabindex="-1" id="modal_comment_directors">
										<div class="modal-dialog" style="max-width: 60vw;">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Запросить пояснительную</h3>
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>
												<div class="modal-body">
													<div id="search_directors_container" class="card-body">
														<form id="modal_comment_directors_form">

															<div class="d-flex align-items-center">

																<!--begin::Input group-->
																<div class="position-relative w-100 me-md-2" style="flex: 1 1 80%">
																	<input id="modal_comment_directors_search_input" type="text" class="form-control form-control-solid ps-10 " name="search" value="" placeholder="Введите Ф.И.О сотрудника">
																	<span class="svg-icon svg-icon-muted svg-icon-1hx position-absolute top-50 translate-middle-y ms-4"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
																			<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
																		</svg>
																	</span>
																	<span id="modal_comment_directors_search-cleane_btn" class="svg-icon svg-icon-muted svg-icon-1hx position-absolute top-50 translate-middle-y end-0 me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="currentColor" />
																			<path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="currentColor" />
																		</svg>
																	</span>
																</div>
																<!--end::Input group-->
																<!--begin:Action-->
																<button id="modal_comment_directors_search_btn" type="submit" class="btn btn-primary w-100" id="kt_button_1" style="flex: 1 1 20%">
																	<span class="indicator-label">
																		Поиск
																	</span>
																	<span class="indicator-progress">
																		Идет поиск...<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
																	</span>
																</button>
															</div>
															<!--end:Action-->
														</form>
														<div id="modal_comment_directors_search-danger-text" class="mt-3 text-danger"></div>
														<div class="table-responsive">
															<table class="table table-bordered">
																<tbody id="search-directors_list">

																</tbody>
															</table>
														</div>
													</div>
												</div>
												<!-- <div class="modal-body">
													<select id="modal_comment_directors_select" class="form-select" data-control="select2" data-placeholder="Выберите из списка">
														<option></option>
													</select>
												</div> -->
												<div class="modal-footer">
													<button id="request_note_btn" type="button" class="btn btn-primary">Запросить пояснительную</button>
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" tabindex="-1" id="modal_description_note_edit">
										<div class="modal-dialog" style="max-width: 60vw;">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Примечания</h3>

													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div class="modal-body">
													<div id="quill_modal_description_note_edit" name="quill_modal_description_note_edit" class="mb-6"></div>
												</div>

												<div class="modal-footer">
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
													<button type="button" class="btn btn-primary" id="modal_description_note_edit_save_btn">Сохранить</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" tabindex="-1" id="modal_comment_note_add">
										<div class="modal-dialog" style="max-width: 60vw;">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Пояснительная</h3>

													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div class="modal-body">
													<div id="quill_modal_comment_note_add" name="quill_modal_comment_note_add" class="mb-6"></div>
												</div>

												<div class="modal-footer">
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
													<button type="button" class="btn btn-primary" id="quill_modal_comment_note_add_save_btn">Сохранить</button>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" tabindex="-1" id="modal_comment_note_edit">
										<div class="modal-dialog" style="max-width: 60vw;">
											<div class="modal-content">
												<div class="modal-header">
													<h3 class="modal-title">Пояснительная</h3>

													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
													</div>
													<!--end::Close-->
												</div>

												<div class="modal-body">
													<div id="quill_modal_comment_note_edit" name="quill_modal_comment_note_add" class="mb-6"></div>
												</div>

												<div class="modal-footer">
													<button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
													<button type="button" class="btn btn-primary" id="quill_modal_comment_note_edit_save_btn">Сохранить</button>
												</div>
											</div>
										</div>
									</div>
									<!--end::Card body-->
									<!-- </div> -->
									<!--end::Summary-->
								</div>
							</div>
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
	<script src="m_assets/js/service_custom/clientServer.js"></script>
	<script src="m_assets/js/service_custom/constructorUrl.js"></script>
	<script src="m_assets/js/service_custom/template.js"></script>
	<script src="m_assets/js/service_custom/sweetAlerts.js"></script>
	<script src="m_assets/js/service_custom/menuClose.js"></script>

	<!--begin::jsCustom js by this page-->
	<script>
		class ServCheckOrderApp {
			constructor() {
				this.url = 'api/v1_0/ServCheck';
				this.responce = new ClientServer();
				this.convertUrl = new ConverterUrl();
				this.orderPageContent = new OrderPageContent();
				this.orderParams = {
					type: 'selected_order',
					order_id: null
				};
				this.order = null;
				this.noteAuthor = null;
				this.noteText = {
					employee_note: [],
					description: null,
					comment: []
				};
				this.mistakeItem = {
					el: null,
					index: null
				};
				this.user = <?php $user = Core::Init('guest');
							echo $user['user']['id']; ?>;
				this.userFio = `<?php $user = Core::Init('guest');
								$user_fio = $user['user']['firstname'] . ' ' . $user['user']['name'] . ' ' . $user['user']['surname'];
								echo $user_fio; ?>`;
			};
			createServCheckOrderApp() {
				this.getOrderId();
				this.createOrderPage();
			};

			getOrderId() { //получение id дела из windows location
				const href = window.location.href;
				const id = href.substring(href.lastIndexOf('-') + 1);
				this.orderParams.order_id = id;
			};

			async checkCurrentUser() {
				const params = {
					type: 'get_user_role',
					act_id: this.order.act_id,
					order_id: this.order.id
				};
				const url = this.convertUrl.pageUrl(this.url, params);
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				console.log(result)
				this.scRole = result;
				if ((this.scRole.servcheck_role == "president" || this.scRole.servcheck_role == "president chief") && this.order.act_status !== "Закрыт" && this.order.user_resolution.member_resolution == 'усмотрена ошибка') {
					document.getElementById('select-critycal_btn').style.display = 'block';
				} else {
					document.getElementById('select-critycal_btn').style.display = 'none';
				};
				if ((this.scRole.servcheck_role == "president" || this.scRole.servcheck_role == "president chief" || this.scRole.servcheck_role == "secretary" || this.scRole.servcheck_role == "secretary chief" || this.scRole.servcheck_role == 'member' || this.scRole.servcheck_role == 'member chief') && this.order.act_status !== "Закрыт") {
					document.getElementById('add-resolution_btn').style.display = 'block';
					document.getElementById('personal_resolution').style.display = 'block';
				} else {
					document.getElementById('add-resolution_btn').style.display = 'none';
					document.getElementById('personal_resolution').style.display = 'none';
				};

				// 
				if (this.scRole.servcheck_role == 'guilty' || this.scRole.servcheck_role == 'secretary') {
					document.getElementById('employee_note_add_btn').style.display = 'block'
				} else {
					document.getElementById('employee_note_add_btn').style.display = 'none'
				};

				if (this.scRole.servcheck_role == 'chief' || this.scRole.servcheck_role == 'secretary') {
					document.getElementById('comment_note_add_btn').style.display = 'block'
				} else {
					document.getElementById('comment_note_add_btn').style.display = 'none'
				};


				this.commentBtnActive()
				this.employeeBtnActive();
				// if (document.getElementById('comment_note_del_btn')) {
				// 	if (this.scRole.service_role == 'sc_admin') {
				// 		document.getElementById('comment_note_del_btn').style.display = "block";
				// 	};
				// }
				// 
				// this.scRole.servcheck_role == 'guilty' 
				// if (this.scRole.servcheck_role == 'chief' || this.scRole.service_role == 'sc_admin') {
				// 	document.getElementById('comment_note_edit_btn').style.display = 'block'
				// }
				// comment_note_edit_btn

				// if()

			};

			commentBtnActive() {
				if (document.querySelector('.comment_note_menu')) {
					if (this.scRole.service_role == 'sc_admin') {
						document.querySelectorAll('.comment_note_menu').forEach((el) => {
							el.style.display = 'block';
						})
					} else {
						document.querySelectorAll('.comment_note_menu').forEach((el) => {
							el.style.display = 'none';
						})
					}
				};
			};

			employeeBtnActive() {
				if (document.querySelector('.employee_note_menu')) {
					if (this.scRole.service_role == 'sc_admin') {
						document.querySelectorAll('.employee_note_menu').forEach((el) => {
							el.style.display = 'block';
						})
					} else {
						document.querySelectorAll('.employee_note_menu').forEach((el) => {
							el.style.display = 'none';
						})
					}
				};
			}

			async createOrderPage() {
				const url = this.convertUrl.pageUrl(this.url, this.orderParams);
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				this.order = result[0]; //получение всех данных по делу
				this.checkCurrentUser();
				this.orderPageContent.setOrderInfo = this.order; //передача данных по делу в контроллер, отвечающий за верстку страницы
				this.orderPageContent.addSelectedOrderContent(); //добавление на страницу статичного контента
				this.orderPageContent.addMistakesModalList(); //добавление списка ошибок в модальное окно для редактирования ошибок
				this.orderPageContent.addCategoriesMistakes(); //добавление категорий ошибок в селект в модальном окне
				this.orderPageContent.addCategoriesMistakesNote(); //добавление ошибок в селект в модальном окне изменения категории и текста ошибки
				this.orderPageContent.createOrderRecommendsTable(); //добавление таблицы рекоммендаций по ошибкам в дело
				this.orderPageContent.selectsParentsModal(); //привязка селектов к модальным окнам
				this.orderPageContent.cleaneGuiltySearchInput(); //очистка инпута поиска сотрудника, совершившего ошибку
				this.addEmployeeNoteText();
				this.addCommentNoteText();
				this.orderPageContent.menuActive();
				this.orderPageContent.addEmployeeNoteContent();
				this.orderPageContent.addCommentNoteContent();
				this.openModalNote(); //открытие модального для запроса пояснительной 
				this.searchGuiltyEmp(); //поиск сотрудника, совершившего ошибку
				this.searchAskDirectorComment(); //поиск директора для запроса пояснительной
				this.addNewMistakes(); //добавить новую ошибку
				this.getMistakes(); //получить ошибки по категории
				this.saveEditMistake(); //сохранить отредактированную ошибку
				this.errorChangeFunc(); //работа с ошибками
				this.cleaneAddMistakeModal(); //очистить модальное окно с ошибками
				this.openModalEditEmployeeNote();
				this.openModalEditComentNote();
				this.editEmployeeNote(); //редактирование объяснительной
				this.deleteEmployeeNote()
				this.editCommentNote(); //редактирование пояснительной
				this.deleteCommentNote();
				this.openEditDescriptionNote(); //редактирование примечания
				// this.editModalNoteContent(); //сохранение объяснительной, пояснительной, примечания
				this.addEmployerNote();
				this.addCommentNote();
				this.editDescriptionNote();
				this.addResolution(); //внести резолюцию
				this.openSelectCriticalMistake(); //открыть модальное окно для выставления критичности ошибки
				this.saveSelectCriticalMistake(); //сохранить выставленную критичность
				this.loadModalRecommendsTable(); //загрузить таблицу с рекомендациями в модальном окне
				this.saveModalRecommendsTable(); //сохранить и привязать рекомендации к делу
				this.cleaneModalRecommends(); //закрытие модального окна с рекоммендациями, очистка контента
				// this.commentNoteSelectDirector(); //подгружаем директоров в селект для отправки пояснительной				
				this.openModalRecommend(); //открытие модельного окна для редактирования методических рекоммендаций
				this.askEmployeeNote(); //запрос объяснительной
				this.askDirectorComment(); //запросить пояснительную
				this.changeGuiltyEmp(); //замена сотрудника совершившего ошибку
				this.sendRecommendation(); //отправить методические рекоммендации
				this.actClose();
				this.openAddEmployeeNote();
				this.orderPageContent.buttonsBlock();

			};

			addEmployeeNoteText() {
				if (this.order.employee_note) {
					try {
						this.noteText.employee_note = JSON.parse(this.order.employee_note);
					} catch (e) {
						const item = {
							text: this.order.employee_note,
							author: '',
							date: ''
						};
						this.noteText.employee_note.push(item);
						console.log(this.noteText.employee_note)
						this.order.employee_note = JSON.stringify(this.noteText.employee_note);
					};
				}
			};

			addCommentNoteText() {
				if (this.order.comment) {
					try {
						this.noteText.comment = JSON.parse(this.order.comment);
					} catch (e) {
						const item = {
							text: this.order.comment,
							author: '',
							date: ''
						};
						this.noteText.comment.push(item);
						console.log(this.noteText.comment)
						this.order.comment = JSON.stringify(this.noteText.comment);
					};
				};
			};

			openModalRecommend() {
				if (document.getElementById('recommend_modal_open_btn')) {
					document.getElementById('recommend_modal_open_btn').addEventListener('click', (e) => {
						e.preventDefault();
						if (this.order.selected_mistakes.length > 0) {
							$('#recommend_modal').modal('show');
						} else {
							this.orderPageContent.alerts.setText = 'Добавьте ошибку в дело!';
							this.orderPageContent.alerts.sweetAlertError();
						}
					});
				};
			};

			openModalEditEmployeeNote() {
				let index;
				let text;
				if (this.order.employee_note) {
					this.noteText.employee_note = JSON.parse(this.order.employee_note);
					if (document.querySelector('.employee_note_edit_btn')) {
						document.querySelectorAll('.employee_note_edit_btn').forEach((el) => {
							el.addEventListener('click', (e) => {
								e.preventDefault();
								console.log('click')
								index = el.dataset.index;
								this.orderPageContent.quillEditNote.setText(this.noteText.employee_note[index].text);
								this.noteAuthor = 'employee';
								document.getElementById('modal_note_edit_save_btn').dataset.index = index;
								$('#modal_note_edit').modal('show');
							});
						});
					};
				};
			};

			openModalEditComentNote() {
				let index;
				let text;
				if (this.order.comment) {
					this.noteText.comment = JSON.parse(this.order.comment);
					if (document.querySelector('.comment_note_edit_btn')) {
						document.querySelectorAll('.comment_note_edit_btn').forEach((el) => {
							el.addEventListener('click', (e) => {
								e.preventDefault();
								console.log('click')
								index = el.dataset.index;
								this.orderPageContent.quillEditComment.setText(this.noteText.comment[index].text);
								this.noteAuthor = 'chief';
								document.getElementById('quill_modal_comment_note_edit_save_btn').dataset.index = index;
								$('#modal_comment_note_edit').modal('show');
							});
						});
					};
				};
			};

			editEmployeeNote() {
				document.getElementById('modal_note_edit_save_btn').addEventListener('click', async (e) => {
					e.preventDefault();
					const index = document.getElementById('modal_note_edit_save_btn').dataset.index;
					this.noteText.employee_note = JSON.parse(this.order.employee_note);
					const quillText = this.orderPageContent.quillEditNote.getText().trim();
					if (quillText) {
						this.noteText.employee_note[index].text = quillText;
						this.order.employee_note = JSON.stringify(this.noteText.employee_note);
						const value = {
							note: JSON.stringify(this.noteText.employee_note)
						};
						const params = {
							type: 'add_note',
							author: this.noteAuthor,
							order_id: this.order.id
						};
						const url = this.convertUrl.pageUrl(this.url, params);
						this.responce.setUrl = url;
						const result = await this.responce.postData(value);
						this.order.employee_note = result;
						if (!result.error) {
							this.orderPageContent.setOrderInfo = this.order;
							this.orderPageContent.alerts.setText = 'Объяснительная изменена!';
							this.orderPageContent.alerts.setSuccessBtnClass = 'employee_edit_success_btn';
							this.orderPageContent.alerts.sweetAlertSuccess();
							if (document.querySelector('.employee_edit_success_btn')) {
								document.querySelector('.employee_edit_success_btn').addEventListener('click', () => {
									$('#modal_note_edit').modal('hide');
									this.orderPageContent.setOrderInfo = this.order;
									this.orderPageContent.addEmployeeNoteContent();
									this.orderPageContent.menuActive();
									this.openModalEditEmployeeNote();
									this.deleteEmployeeNote()
									this.employeeBtnActive();
								});
							};
						} else {
							this.orderPageContent.alerts.setText = result.error + '!';
							this.orderPageContent.alerts.sweetAlertError();
						};
					} else {
						this.orderPageContent.alerts.setText = 'Введите текст!';
						this.orderPageContent.alerts.sweetAlertError();
					};
				});
			};

			editCommentNote() {
				document.getElementById('quill_modal_comment_note_edit_save_btn').addEventListener('click', async (e) => {
					e.preventDefault();
					const index = document.getElementById('quill_modal_comment_note_edit_save_btn').dataset.index;
					this.noteText.comment = JSON.parse(this.order.comment);
					const quillText = this.orderPageContent.quillEditComment.getText().trim();
					if (quillText) {
						console.log(index)
						this.noteText.comment[index].text = quillText;

						this.order.comment = JSON.stringify(this.noteText.comment);
						const value = {
							note: JSON.stringify(this.noteText.comment)
						};
						const params = {
							type: 'add_note',
							author: this.noteAuthor,
							order_id: this.order.id
						};
						const url = this.convertUrl.pageUrl(this.url, params);
						this.responce.setUrl = url;
						const result = await this.responce.postData(value);
						this.order.comment = result;
						if (!result.error) {
							this.orderPageContent.setOrderInfo = this.order;
							this.orderPageContent.alerts.setText = 'Пояснительная изменена!';
							this.orderPageContent.alerts.setSuccessBtnClass = 'comment_edit_success_btn';
							this.orderPageContent.alerts.sweetAlertSuccess();
							if (document.querySelector('.comment_edit_success_btn')) {
								document.querySelector('.comment_edit_success_btn').addEventListener('click', () => {
									$('#modal_comment_note_edit').modal('hide');
									this.orderPageContent.setOrderInfo = this.order;
									this.orderPageContent.addCommentNoteContent();
									this.orderPageContent.menuActive();
									this.openModalEditComentNote();
									this.deleteCommentNote();
									this.commentBtnActive()
								});
							};
						} else {
							this.orderPageContent.alerts.setText = result.error + '!';
							this.orderPageContent.alerts.sweetAlertError();
						};
					} else {
						this.orderPageContent.alerts.setText = 'Введите текст!';
						this.orderPageContent.alerts.sweetAlertError();
					};
				});
			};


			deleteEmployeeNote() {
				if (document.querySelector('.employee_note_del_btn')) {
					document.querySelectorAll('.employee_note_del_btn').forEach((el) => {
						el.addEventListener('click', async (e) => {
							e.preventDefault();
							const index = el.dataset.index;
							this.noteText.employee_note = JSON.parse(this.order.employee_note);
							const newNoteList = this.noteText.employee_note.splice(index, 1);
							this.order.employee_note = JSON.stringify(this.noteText.employee_note);
							const value = {
								note: ''
							};
							if (this.noteText.employee_note.length > 0) {
								value.note = this.order.employee_note;
							};

							const params = {
								type: 'add_note',
								author: 'employee',
								order_id: this.order.id
							};

							const url = this.convertUrl.pageUrl(this.url, params);
							this.responce.setUrl = url;
							const result = await this.responce.postData(value);
							console.log(result)
							this.order.employee_note = result;
							if (!result.error) {
								this.orderPageContent.setOrderInfo = this.order;
								this.orderPageContent.alerts.setText = 'Объяснительная удалена!';
								this.orderPageContent.alerts.setSuccessBtnClass = 'employee_del_success_btn';
								this.orderPageContent.alerts.sweetAlertSuccess();
								if (document.querySelector('.employee_del_success_btn')) {
									document.querySelector('.employee_del_success_btn').addEventListener('click', () => {
										this.orderPageContent.setOrderInfo = this.order;
										this.orderPageContent.addEmployeeNoteContent();
										this.orderPageContent.menuActive();
										this.openModalEditEmployeeNote();
										this.deleteEmployeeNote()
										this.employeeBtnActive();
									});
								};
							} else {
								this.orderPageContent.alerts.setText = result.error + '!';
								this.orderPageContent.alerts.sweetAlertError();
							};
						});
					});
				};
			};

			deleteCommentNote() {
				if (document.querySelector('.comment_note_del_btn')) {
					document.querySelectorAll('.comment_note_del_btn').forEach((el) => {
						el.addEventListener('click', async (e) => {
							e.preventDefault();
							const index = el.dataset.index;
							this.noteText.comment = JSON.parse(this.order.comment);
							const newNoteList = this.noteText.comment.splice(index, 1);
							this.order.comment = JSON.stringify(this.noteText.comment);
							const value = {
								note: ''
							};
							if (this.noteText.comment.length > 0) {
								value.note = this.order.comment;
							};
							const params = {
								type: 'add_note',
								author: 'chief',
								order_id: this.order.id
							};
							const url = this.convertUrl.pageUrl(this.url, params);
							this.responce.setUrl = url;
							const result = await this.responce.postData(value);
							console.log(result)
							this.order.comment = result;
							if (!result.error) {
								this.orderPageContent.setOrderInfo = this.order;
								this.orderPageContent.alerts.setText = 'Пояснительная удалена!';
								this.orderPageContent.alerts.setSuccessBtnClass = 'comment_del_success_btn';
								this.orderPageContent.alerts.sweetAlertSuccess();
								if (document.querySelector('.comment_del_success_btn')) {
									document.querySelector('.comment_del_success_btn').addEventListener('click', () => {
										this.orderPageContent.setOrderInfo = this.order;
										this.orderPageContent.addCommentNoteContent();
										this.orderPageContent.menuActive();
										this.openModalEditComentNote();
										this.deleteCommentNote()
										this.commentBtnActive()
									});
								};
							} else {
								this.orderPageContent.alerts.setText = result.error + '!';
								this.orderPageContent.alerts.sweetAlertError();
							};
						});
					});
				};
			};

			openAddEmployeeNote() {
				if (document.getElementById('employee_note_add_btn')) {
					document.getElementById('employee_note_add_btn').addEventListener('click', (e) => {
						e.preventDefault();
						this.noteAuthor = 'employee';
						this.orderPageContent.addEmployeeNoteTitle();
						this.orderPageContent.quillAddNote.setText('');
						$('#modal_add_note').modal('show');
					});
				};
			};

			openModalNote() {
				this.orderPageContent.Mod
				if (document.getElementById('comment_note_request_btn')) {
					document.getElementById('comment_note_request_btn').addEventListener('click', (e) => {
						e.preventDefault();
						if (this.order.selected_mistakes.length > 0) {
							this.orderPageContent.ModalNoteContentCleane();
							this.orderPageContent.quillAddComment.setText('');
							$('#modal_comment_directors').modal('show');
						} else {
							this.orderPageContent.alerts.setText = 'Добавьте ошибку в дело!';
							this.orderPageContent.alerts.sweetAlertError();
						};
					});
				};
			};

			askEmployeeNote() {
				if (document.getElementById('modal_note_ask_btn')) {
					document.getElementById('modal_note_ask_btn').addEventListener('click', async (e) => {
						e.preventDefault();
						if (this.order.selected_mistakes.length > 0) {
							this.orderPageContent.alerts.setText = 'Запрос объяснительной будет направлен на почту сотруднику, совершившему ошибку!'
							this.orderPageContent.alerts.setConfirmBtnText = "Запросить!";
							this.orderPageContent.alerts.setConfirmBtnClass = 'note_ask_start_btn';
							this.orderPageContent.alerts.sweetAlertTwobtn();
							if (document.querySelector('.note_ask_start_btn')) {
								document.querySelector('.note_ask_start_btn').addEventListener('click', async (e) => {
									const params = {
										type: 'send_mail',
										act_id: this.order.act_id
									};
									const data = {
										user_data: JSON.stringify({
											order_id: this.order.id,
											role: 3
										})
									};
									const url = this.convertUrl.pageUrl(this.url, params);
									console.log(url)
									this.responce.setUrl = url;
									const result = await this.responce.postData(data);
									console.log(result)
									if (result.type == "ok") {
										this.orderPageContent.alerts.setText = result.text + '!';
										this.orderPageContent.alerts.sweetAlertSuccess();
										//     //TODO сделать маркер- запрошена объяснительная или не запрошена
									} else {
										this.orderPageContent.alerts.setText = result.error + '!';
										this.orderPageContent.alerts.sweetAlertError()
									};
								});
							};
						} else {
							this.orderPageContent.alerts.setText = 'Добавьте ошибку в дело';
							this.orderPageContent.alerts.sweetAlertError()
						};
					});
				};
			};

			askDirectorComment() {
				document.getElementById('request_note_btn').addEventListener('click', async () => {
					const params = {
						type: 'send_mail',
						act_id: this.order.act_id
					};
					const data = {
						order_id: this.order.id,
						fio: null,
						role: 4
					};
					document.querySelectorAll('.director_check').forEach((el) => {
						if (el.checked) {
							data.fio = el.dataset.username;
						}
					});
					if (data.fio) {
						const value = {
							user_data: JSON.stringify(data)
						};
						const url = this.convertUrl.pageUrl(this.url, params);
						console.log(url)
						this.responce.setUrl = url;
						const result = await this.responce.postData(value);
						console.log(result)
						if (result.type == "ok") {
							this.orderPageContent.alerts.setText = result.text + '!';
							this.orderPageContent.alerts.setSuccessBtnClass = 'request_note_success_btn';
							this.orderPageContent.alerts.sweetAlertSuccess();
							if (document.querySelector('.request_note_success_btn')) {
								document.querySelector('.request_note_success_btn').addEventListener('click', () => {
									$('#modal_comment_directors').modal('hide');
								})
							};

							//TODO сделать маркер- запрошена пояснительная или не запрошена
						} else {
							this.orderPageContent.alerts.setText = result.error + '!';
							this.orderPageContent.alerts.sweetAlertError();
						};
					} else {
						this.orderPageContent.alerts.setText = 'Выберите сотрудника!';
						this.orderPageContent.alerts.sweetAlertError()
					};
				});
			};

			openEditDescriptionNote() {
				if (document.getElementById('description_note_edit_btn')) {
					document.getElementById('description_note_edit_btn').addEventListener('click', (e) => {
						e.preventDefault();
						if (this.order.description) {
							this.orderPageContent.addDescriptionNoteContent();
						};
						$('#modal_description_note_edit').modal('show');
						this.noteAuthor = 'secretary';
					});
				};
			};

			editDescriptionNote() {
				if (document.getElementById('modal_description_note_edit_save_btn')) {
					document.getElementById('modal_description_note_edit_save_btn').addEventListener('click', async (e) => {
						e.preventDefault();
						const textQuill = this.orderPageContent.quillDescription.getText().trim();
						this.orderPageContent.alerts.setText = 'Изменения сохранены!';
						this.orderPageContent.alerts.setSuccessBtnClass = 'modal_description_note_success_btn';
						if (textQuill !== '' && textQuill !== this.order.description) {
							this.noteText.description = textQuill;
							const value = {
								note: textQuill
							};
							const params = {
								type: 'add_note',
								author: this.noteAuthor,
								order_id: this.order.id
							};
							const url = this.convertUrl.pageUrl(this.url, params);
							this.responce.setUrl = url;
							const result = await this.responce.postData(value);
							this.order.description = result;
							this.orderPageContent.setOrderInfo = this.order;
							document.getElementById('description').textContent = this.orderPageContent.orderInfo.description;
						};
						this.orderPageContent.alerts.sweetAlertSuccess();
						if (document.querySelector('.modal_description_note_success_btn')) {
							document.querySelector('.modal_description_note_success_btn').addEventListener('click', () => {
								$('#modal_description_note_edit').modal('hide');
							});
						};
					});
				};
			};


			editModalNoteContent() {
				document.getElementById('modal_notesave_btn').addEventListener('click', async (e) => {
					e.preventDefault();

					let text2;
					if (this.noteAuthor == 'employee') {
						text2 = this.order.employee_note;

					} else if (this.noteAuthor == 'secretary') {
						text2 = this.order.description;
					} else if (this.noteAuthor == 'chief') {
						text2 = this.order.comment;
					};
					if (text1 !== '' && text1 !== text2) {

						const data = {
							date: this.createDateNow(),
							author: this.userFio,
							text: text1
						};
						this.noteText.push(data)
						console.log(this.noteText)
						console.log(this.userFio)
						const value = {
							note: JSON.stringify(this.noteText)
						};
						const params = {
							type: 'add_note',
							author: this.noteAuthor,
							order_id: this.order.id
						};
						const url = this.convertUrl.pageUrl(this.url, params);
						this.responce.setUrl = url;
						const result = await this.responce.postData(value);
						if (this.noteAuthor == 'employee') {
							this.order.employee_note = result;
							this.orderPageContent.setOrderInfo = this.order;
							// this.orderPageContent.addEmployeeNoteContent();
							console.log(this.orderPageContent.orderInfo.employee_note);
						} else if (this.noteAuthor == 'secretary') {
							this.order.description = result;
							this.orderPageContent.setOrderInfo = this.order;
							document.getElementById('description').textContent = this.orderPageContent.orderInfo.description;
							// } else if (this.noteAuthor == 'chief') {
							// 	this.order.comment = result;
							// 	this.orderPageContent.setOrderInfo = this.order;
							// 	document.getElementById('modal_comment_body').textContent = this.orderPageContent.orderInfo.comment;
						};
					};
					this.orderPageContent.alerts.sweetAlertSuccess();
					document.querySelector('.modal_note_success_btn').addEventListener('click', () => {
						$('#modal_note').modal('hide');
					});
				});
				//TODO при закрытии всех вторых модалок без кнопки при успешном сохранении закрывать первые, не сохраняются пустые поясниельная, объяснительная и примечания
			};

			addEmployerNote() {
				if (document.getElementById('modal_add_note_save_btn')) {
					document.getElementById('modal_add_note_save_btn').addEventListener('click', async (e) => {
						e.preventDefault();
						const text = this.orderPageContent.quillAddNote.getText().trim();
						if (text) {
							this.orderPageContent.alerts.setText = 'Изменения сохранены!';
							this.orderPageContent.alerts.setSuccessBtnClass = 'modal_note_success_btn';
							const data = {
								date: this.createDateNow(),
								author: this.userFio,
								text: text
							};
							this.noteText.employee_note.push(data)
							console.log(this.noteText)
							const value = {
								note: JSON.stringify(this.noteText.employee_note)
							};

							const params = {
								type: 'add_note',
								author: this.noteAuthor,
								order_id: this.order.id
							};
							const url = this.convertUrl.pageUrl(this.url, params);
							this.responce.setUrl = url;
							const result = await this.responce.postData(value);
							this.order.employee_note = result;
							console.log(result)
							if (result) {
								this.orderPageContent.setOrderInfo = this.order;
								this.orderPageContent.alerts.setText = 'Объяснтельная добавлена!';
								this.orderPageContent.alerts.setSuccessBtnClass = 'employee_add_success_btn';
								this.orderPageContent.alerts.sweetAlertSuccess();
								if (document.querySelector('.employee_add_success_btn')) {
									document.querySelector('.employee_add_success_btn').addEventListener('click', () => {
										$('#modal_add_note').modal('hide');
									});
									this.orderPageContent.addEmployeeNoteContent();
									this.orderPageContent.menuActive();
									this.openModalEditEmployeeNote();
									this.deleteEmployeeNote();
									this.employeeBtnActive();
								};
							};
						} else {
							this.orderPageContent.alerts.setText = 'Введите текст!';
							this.orderPageContent.alerts.sweetAlertError();
						};
					});
				};
			};

			addCommentNote() {
				if (document.getElementById('quill_modal_comment_note_add_save_btn')) {
					document.getElementById('quill_modal_comment_note_add_save_btn').addEventListener('click', async (e) => {
						e.preventDefault();
						const text = this.orderPageContent.quillAddComment.getText().trim();
						this.noteAuthor = 'chief';
						if (text) {
							this.orderPageContent.alerts.setText = 'Изменения сохранены!';
							this.orderPageContent.alerts.setSuccessBtnClass = 'modal_note_success_btn';
							const data = {
								date: this.createDateNow(),
								author: this.userFio,
								text: text
							};
							this.noteText.comment.push(data)
							console.log(this.noteText)
							const value = {
								note: JSON.stringify(this.noteText.comment)
							};

							const params = {
								type: 'add_note',
								author: this.noteAuthor,
								order_id: this.order.id
							};
							const url = this.convertUrl.pageUrl(this.url, params);
							this.responce.setUrl = url;
							const result = await this.responce.postData(value);
							this.order.comment = result;
							console.log(result)
							if (result) {
								this.orderPageContent.setOrderInfo = this.order;
								this.orderPageContent.alerts.setText = 'Пояснительная добавлена!';
								this.orderPageContent.alerts.setSuccessBtnClass = 'comment_add_success_btn';
								this.orderPageContent.alerts.sweetAlertSuccess();
								if (document.querySelector('.comment_add_success_btn')) {
									document.querySelector('.comment_add_success_btn').addEventListener('click', () => {
										$('#modal_comment_note_add').modal('hide');
									});
									this.orderPageContent.addCommentNoteContent();
									this.orderPageContent.menuActive();
									this.openModalEditComentNote();
									this.deleteCommentNote();
									this.commentBtnActive()
								};
							};


						} else {
							this.orderPageContent.alerts.setText = 'Введите текст!';
							this.orderPageContent.alerts.sweetAlertError();
						}


					});
				};
			};


			createDateNow() {
				const now = new Date();
				let day = String(now.getDate());
				let month = String(now.getMonth() + 1);
				const year = String(now.getFullYear());
				if (day.length == 1) {
					day = '0' + day;
				};
				if (month.length == 1) {
					month = '0' + month;
				};
				const date = day + '.' + month + '.' + year;
				return date;
				console.log(day + '.' + month + '.' + year);
			};

			addResolution() {
				$("#resolution_category").select2({
					minimumResultsForSearch: Infinity
				});
				document.getElementById('add-resolution').addEventListener('click', async (el) => {
					if (this.order.selected_mistakes.length > 0) {
						if ($('#resolution_category').val()) {
							console.log($('#resolution_category').val())
							if (this.scRole.servcheck_role == "president" && this.order.selected_mistakes[0].critical == 1 && $('#resolution_category').val() == 1) {
								this.orderPageContent.alerts.setText = 'Отмените необходимость служебной проверки!';
								this.orderPageContent.alerts.sweetAlertError();
							} else {
								const params = {
									type: 'add_resolution',
									member_resolution: $('#resolution_category').val(),
									order_id: this.order.id
								};
								const url = this.convertUrl.pageUrl(this.url, params);
								this.responce.setUrl = url;
								const result = await this.responce.getData();
								console.log(result)
								if (result.type == 'ok') {
									this.order.user_resolution.member_resolution = this.orderPageContent.resolutionText[params.member_resolution].text;
									this.orderPageContent.setOrderInfo = this.order;
									this.orderPageContent.alerts.setText = 'Резолюция установлена!';
									this.orderPageContent.alerts.setSuccessBtnClass = 'resolution_success_btn';
									this.orderPageContent.alerts.sweetAlertSuccess()
									document.querySelector('.resolution_success_btn').addEventListener('click', () => {
										this.orderPageContent.addResolutionContent();
										this.critycalBtnActive();
										$('#resolution_modal').modal('hide');
									});
								} else {
									this.orderPageContent.alerts.setText = result.text + '!';
									this.orderPageContent.alerts.sweetAlertError();
								};
							};

						} else {
							this.orderPageContent.alerts.setText = 'Резолюция не установлена!';
							this.orderPageContent.alerts.sweetAlertError();
						};
					} else {
						this.orderPageContent.alerts.setText = 'Добавьте ошибку в дело!';
						this.orderPageContent.alerts.sweetAlertError();
					}

				});
			};

			critycalBtnActive() {
				if (this.order.user_resolution.member_resolution == 'усмотрена ошибка' && (this.scRole.servcheck_role == 'president chief' || this.scRole.servcheck_role == 'president')) {
					document.getElementById('select-critycal_btn').style.display = 'block';
				} else {
					document.getElementById('select-critycal_btn').style.display = 'none';
				}
			}

			searchGuiltyEmp() {
				const input = document.getElementById('emps-search_input');
				let timeout = null;
				let value;
				const sendInputContent = (e) => {
					e.preventDefault();
					document.getElementById('emps-search-danger-text').textContent = '';

					clearTimeout(timeout);
					timeout = setTimeout(() => {
						value = input.value.trim().replace(/\s+/g, ' ');
						if (value && value.length > 2) {
							this.addSearchEmpTable(value);
						} else {
							document.getElementById('emps-search-danger-text').textContent = 'введите не менее 4 символов';
						}
					}, 300);
					document.getElementById('emps-search_btn').removeAttribute("data-kt-indicator");
					document.getElementById('emps-search_btn').disabled = false;
				};
				input.addEventListener('input', sendInputContent);
				document.getElementById('search-emps_form').addEventListener('submit', sendInputContent);
				document.getElementById('emps-search-cleane_btn').addEventListener('click', () => {
					document.getElementById('emps-search-danger-text').value = '';
					document.getElementById('search-emps_list').innerHTML = '';
				})
			};

			searchAskDirectorComment() {
				const input = document.getElementById('modal_comment_directors_search_input');
				let timeout = null;
				let value;
				const sendInputContent = (e) => {
					e.preventDefault();
					document.getElementById('modal_comment_directors_search-danger-text').textContent = '';
					clearTimeout(timeout);
					timeout = setTimeout(() => {
						value = input.value.trim().replace(/\s+/g, ' ');
						if (value && value.length > 3) {
							this.commentNoteSelectDirector(value);
						} else {
							document.getElementById('modal_comment_directors_search-danger-text').textContent = 'введите не менее 4 символов';
							document.getElementById('search-directors_list').innerHTML = '';
						};
					}, 300);
				};
				input.addEventListener('input', sendInputContent)
				document.getElementById('modal_comment_directors_form').addEventListener('submit', sendInputContent);
				document.getElementById('modal_comment_directors_search-cleane_btn').addEventListener('click', () => {
					document.getElementById('modal_comment_directors_search_input').value = '';
					document.getElementById('search-directors_list').innerHTML = '';
				});
			};

			async addSearchEmpTable(value) {
				const button = document.getElementById('emps-search_btn');
				this.orderPageContent.loaderActive(button);
				const params = {
					type: 'search_guilty',
					guilty_fio: value,
				};

				const url = this.convertUrl.pageUrl(this.url, params);
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				this.orderPageContent.setEmps = result;
				let timeout = null;
				clearTimeout(timeout);
				timeout = setTimeout(() => {
					this.orderPageContent.addSearchEmpsList();
					this.orderPageContent.oneCheck('.guilty_check');
					this.closeEmpsModal();
				}, 300);
				document.getElementById('emps-search_btn').removeAttribute("data-kt-indicator");
				document.getElementById('emps-search_btn').disabled = false;
			};

			changeGuiltyEmp() {
				document.getElementById('emp_add_btn').addEventListener('click', async () => {
					if (document.querySelector('.guilty_check')) {
						const params = {
							type: 'change_guilty',
							order_id: this.order.id,
							user_id: null
						};
						let name;
						let position;
						document.querySelectorAll('.guilty_check').forEach((el) => {
							if (el.checked) {
								params.user_id = el.dataset.empid;
								name = el.dataset.username;
								position = el.dataset.position;
							};
						});

						if (params.user_id) {
							const url = this.convertUrl.pageUrl(this.url, params);
							this.responce.setUrl = url;
							const result = await this.responce.getData();
							if (result.type == "ok") {
								this.order.user_display_name = name;
								this.order.cpgu_user_position = position;
								this.orderPageContent.setOrderInfo = this.order;
								document.getElementById('user_display_name').textContent = this.order.user_display_name;
								document.getElementById('user_position').textContent = this.order.cpgu_user_position
								this.orderPageContent.alerts.setText = 'Изменения сохранены!';
								this.orderPageContent.alerts.setSuccessBtnClass = 'modal_emp_success_btn';
								this.orderPageContent.alerts.sweetAlertSuccess();
								document.querySelector('.modal_emp_success_btn').addEventListener('click', () => {
									$('#emp_modal').modal('hide');
								});
							} else {
								this.orderPageContent.alerts.setText = result.error + '!';
								this.orderPageContent.alerts.sweetAlertError();
							};
						} else {
							this.orderPageContent.alerts.setText = 'Выберите сотрудника!';
							this.orderPageContent.alerts.sweetAlertError();
						};


					} else {
						this.orderPageContent.alerts.setText = 'Выберите сотрудника!';
						this.orderPageContent.alerts.sweetAlertError();
					};
				});
			};

			closeEmpsModal() {
				$("#emp_modal").on("hidden.bs.modal", () => {
					this.orderPageContent.cleaneEmpsModal();
				});
			};

			errorChangeFunc() {
				this.orderPageContent.cleaneMistakesCategories();
				this.orderPageContent.addMistakesModalList();
				this.orderPageContent.addMistakeList(); //добавление списка ошибок по делу
				this.orderPageContent.addRecommendSelectOptions();
				this.orderPageContent.createOrderRecommendsTable();
				this.editMistakes();
				this.deleteMistakes(); //удалить ошибку
				this.menuActive(); //активация меню
			};

			getMistakes() {
				$('#mistakes_category').on('select2:select', async (e) => {
					const params = {
						type: 'get_mistakes',
						category_id: $('#mistakes_category').val()
					};
					const url = this.convertUrl.pageUrl(this.url, params);
					this.responce.setUrl = url;
					this.mistakes = await this.responce.getData();
					this.orderPageContent.setMistakes = Object.values(this.mistakes);
					this.orderPageContent.addMistakes();
					this.orderPageContent.addNewMistakesInput();
					this.orderPageContent.addMistakeBtn();
				});
			};

			addNewMistakes() {
				document.getElementById('add-mistakes_btn').addEventListener('click', async (el) => {
					if (this.order.selected_mistakes.length == 0) {
						let result;
						const value = $('#mistakes').val()
						if (value) {
							if (value !== 'new') {
								const params = {
									type: 'add_mistake_order',
									order_id: this.order.id,
									mistake_id: $('#mistakes').val()
								};
								const url = this.convertUrl.pageUrl(this.url, params);
								this.responce.setUrl = url;
								result = await this.responce.getData();
								if (result.type == 'error') {
									this.orderPageContent.alerts.setText = result.error + '!';
									this.orderPageContent.alerts.sweetAlertError();
									this.orderPageContent.cleaneMistakesCategories();
								} else {
									this.order.selected_mistakes = result.mistakes;
									this.order.recommend = result.recommends;
									const item = this.order.selected_mistakes[this.order.selected_mistakes.length - 1].id;
									this.order.recommend[`${item}`] = [];
									this.orderPageContent.setOrderInfo = this.order;
									this.orderPageContent.alerts.setText = 'Ошибка добавлена!';
									this.orderPageContent.alerts.setSuccessBtnClass = "mistakes_add_success_btn"
									this.orderPageContent.alerts.sweetAlertSuccess();
									if (document.querySelector('.mistakes_add_success_btn')) {
										document.querySelector('.mistakes_add_success_btn').addEventListener('click', () => {
											$('#add_mistakes_modal').modal('hide');
										})
									}
									this.errorChangeFunc();

								};
							} else {
								const newMistake = document.getElementById('new-mistakes_input').value;
								const params = {
									type: 'add_mistaketolist'
								};
								const url = this.convertUrl.pageUrl(this.url, params);
								this.responce.setUrl = url;
								const date = {
									mistake_data: JSON.stringify({
										category_id: $('#mistakes_category').val(),
										description: newMistake,
										order_id: this.order.id
									})
								};
								result = await this.responce.postData(date);
								console.log(result);
								this.order.selected_mistakes = result.mistakes;
								this.order.recommend = result.recommends;
								this.orderPageContent.setOrderInfo = this.order;
								this.orderPageContent.alerts.setText = 'Ошибка добавлена!';
								this.orderPageContent.alerts.setSuccessBtnClass = "mistakes_add_success_btn"
								this.orderPageContent.alerts.sweetAlertSuccess();
								if (document.querySelector('.mistakes_add_success_btn')) {
									document.querySelector('.mistakes_add_success_btn').addEventListener('click', () => {
										$('#add_mistakes_modal').modal('hide');
									})
								}
								this.errorChangeFunc();
							};
						};
					} else {
						this.orderPageContent.alerts.setText = 'Нельзя добавить в дело больше одной ошибки!';
						this.orderPageContent.alerts.sweetAlertError();
					}

				});
			};

			deleteMistakes() {
				document.querySelectorAll('.mistakes_delete_btn').forEach((el) => {
					el.addEventListener('click', (e) => {
						e.preventDefault();
						this.orderPageContent.alerts.setText = 'Вы точно желаете удалить из дела ошибку? Вместе с ошибкой будет удалена резолюция всех членов комиссии по этому делу!', "Удалить ошибку!";
						this.orderPageContent.alerts.setConfirmBtnClass = 'mistake-del_btn';
						this.orderPageContent.alerts.setConfirmBtnText = "Удалить!";
						const params = {
							type: 'del_mistake_order',
							order_id: this.order.id,
							mistake_id: el.dataset.misDelId
						};
						this.orderPageContent.alerts.sweetAlertTwobtn();
						document.querySelector('.mistake-del_btn').addEventListener('click', async () => {
							const url = this.convertUrl.pageUrl(this.url, params)
							this.responce.setUrl = url;
							const result = await this.responce.getData();
							console.log(result)
							this.order.selected_mistakes = result.mistakes;
							this.order.user_resolution.member_resolution = 'резолюция не внесена';
							this.order.recommend = result.recommends;
							this.orderPageContent.setOrderInfo = this.order;
							this.errorChangeFunc();
							this.orderPageContent.addResolutionContent();
						});
					});
				});
			};

			editMistakes() {
				document.querySelectorAll('.mistakes_edit_btn').forEach((el) => {
					el.addEventListener('click', (it, index) => {
						this.order.selected_mistakes.forEach((it, index) => {
							if (it.mis_id == el.dataset.misEditId) {
								this.mistakeItem.el = it;
								this.mistakeItem.index = index;
								$('#mistakes_note_category').val(this.mistakeItem.el.cat_id);
								$('#mistakes_note_category').trigger('change');
								this.orderPageContent.quillMistakeNote.setText('');
								this.orderPageContent.quillMistakeNote.setText(this.mistakeItem.el.mis_name);
								$('#add_mistakes_modal').modal('hide');
								$('#modal_mistakes_note').modal('show');
								console.log('open modal');
								this.errorChangeFunc();
							};
							$("#modal_mistakes_note").on("hidden.bs.modal", () => {
								$('#add_mistakes_modal').modal('show');
								$('#mistakes_note_category').val(null);
							});
						});
					});
				});
			};

			saveEditMistake() {
				document.getElementById('modal_mistake_note_save_btn').addEventListener('click', () => {
					this.orderPageContent.alerts.setText = 'Текст и категория ошибки будут изменены во всех актах, где она выбрана!';
					this.orderPageContent.alerts.setConfirmBtnText = 'Изменить ошибку';
					this.orderPageContent.alerts.setConfirmBtnClass = 'change_mistake_confirm_btn';
					this.orderPageContent.alerts.sweetAlertTwobtn();
					document.querySelector('.change_mistake_confirm_btn').addEventListener('click', async () => {
						const selectData = $('#mistakes_note_category').select2('data');
						const mistakeText = this.orderPageContent.quillMistakeNote.getText().trim();
						if (mistakeText) {
							const data = {
								mistake_data: JSON.stringify({
									category_id: Number(selectData[0].id),
									description: mistakeText,
									mistake_id: this.mistakeItem.el.mis_id,
									order_id: this.order.id
								})
							};
							const params = {
								type: 'edit_mistakeinlist'
							};
							const url = this.convertUrl.pageUrl(this.url, params);
							this.responce.setUrl = url;
							const result = await this.responce.postData(data);
							this.order.selected_mistakes = result.mistakes;
							this.order.recommend = result.recommends;
							this.orderPageContent.setOrderInfo = this.order;
							this.orderPageContent.alerts.setText = 'Ошибка изменена!';
							this.orderPageContent.alerts.setSuccessBtnClass = "mistakes_edit_success_btn"
							this.orderPageContent.alerts.sweetAlertSuccess();
							document.querySelector('.mistakes_edit_success_btn').addEventListener('click', () => {
								this.errorChangeFunc();
								$('#modal_mistakes_note').modal('hide');
								$('#add_mistakes_modal').modal('show');
							});
						};
					});
				});
			};

			cleaneAddMistakeModal() {
				$("#add_mistakes_modal").on("hidden.bs.modal", () => {
					this.orderPageContent.cleaneMistakesCategories();
				});
			};

			openSelectCriticalMistake() {
				document.getElementById('select-critycal_btn').addEventListener('click', (e) => {
					e.preventDefault();
					if (this.order.selected_mistakes.length > 0) {
						this.orderPageContent.alerts.setConfirmBtnClass = 'add_critical_btn';
						this.orderPageContent.alerts.setCancelBtnClass = 'cancel_critical_btn';
						if (this.order.selected_mistakes[0].critical == 1) {
							this.orderPageContent.alerts.setText = 'Отменить служебную проверку?';
							this.orderPageContent.alerts.setConfirmBtnText = 'Отменить служебную проверку';
							// document.querySelector('.add_critical_btn').dataset.critical = 1

						} else if (this.order.selected_mistakes[0].critical == 0) {
							this.orderPageContent.alerts.setText = 'Информация по данной ошибке будет направлена в общий отдел для проведения служебной проверки после завершения акта';
							this.orderPageContent.alerts.setConfirmBtnText = 'Требуется служебная проверка';
							// document.querySelector('.add_critical_btn').dataset.critical = 1


						}

						this.orderPageContent.alerts.sweetAlertTwobtn();
						this.saveSelectCriticalMistake()
						// $('#select-critical_modal').modal('show');
						// this.orderPageContent.addModalSelectCriticalList();


					} else {
						this.orderPageContent.alerts.setText = 'Не выбрано ни одной ошибки!';
						this.orderPageContent.alerts.sweetAlertError();
					};
				});
			};

			saveSelectCriticalMistake() {
				// document.getElementById('select-critical_modal_save_btn').addEventListener('click', (e) => {
				// e.preventDefault();
				// this.orderPageContent.alerts.setText = 'Информация по данной ошибке будет направлена в общий отдел для проведения служебной проверки после завершения акта';
				// this.orderPageContent.alerts.setConfirmBtnText = 'Требуется служебная проверка';
				// this.orderPageContent.alerts.setConfirmBtnClass = 'add_critical_btn';
				// this.orderPageContent.alerts.setCancelBtnClass = 'cancel_critical_btn';
				// this.orderPageContent.alerts.sweetAlertTwobtn();
				if (document.querySelector('.add_critical_btn')) {
					document.querySelector('.add_critical_btn').addEventListener('click', async () => {
						if (this.order.selected_mistakes.length > 0) {
							let item = {};
							// document.querySelectorAll('.select-critical_modal_check').forEach((el) => {
							// 	if (el.checked) {
							if (this.order.selected_mistakes[0].critical == 1) {
								item[this.order.selected_mistakes[0].id] = 0;
							} else if (this.order.selected_mistakes[0].critical == 0) {
								item[this.order.selected_mistakes[0].id] = 1;
							}

							// 	} else {
							// 		item[el.value] = 0
							// 	};
							// });

							console.log(item)
							const params = {
								type: 'add_critical',
								order_id: this.order.id
							};
							const data = {
								mistake_critical: JSON.stringify(item)
							};
							const url = this.convertUrl.pageUrl(this.url, params);
							this.responce.setUrl = url;
							const result = await this.responce.postData(data);
							console.log(result);
							//TODO добавить обработку ошибок
							this.order.selected_mistakes = result;
							this.orderPageContent.addModalSelectCriticalList();
							this.orderPageContent.addMistakeList();
							this.orderPageContent.alerts.setText = 'Необходимость служебной проверки по ошибке установлена!';
							this.orderPageContent.alerts.setSuccessBtnClass = "selected_critical_success_btn"
							this.orderPageContent.alerts.sweetAlertSuccess();
							document.querySelector('.selected_critical_success_btn').addEventListener('click', () => {
								$('#select-critical_modal').modal('hide');
							});
							$("#select-critical_modal").on("hidden.bs.modal", () => {
								this.orderPageContent.addModalSelectCriticalList();
							});
						} else {
							this.orderPageContent.alerts.setText = 'Добавьте ошибку в дело!';
							this.orderPageContent.alerts.sweetAlertError();
						};
					});
				}


				// });
			};

			loadModalRecommendsTable() {
				$("#recommend_modal_select").on("select2:select", async () => {
					const params = {
						type: 'get_dep_recommend',
						department_id: this.order.department_id
					};
					const url = this.convertUrl.pageUrl(this.url, params);
					this.responce.setUrl = url;
					const result = await this.responce.getData();
					console.log(result);
					this.orderPageContent.setListRecommends = result;
					this.orderPageContent.createModalRecommendTable();
				});
			};

			cleaneModalRecommends() {
				$("#recommend_modal").on('hide.bs.modal', () => {
					this.orderPageContent.cleaneModalRecommendContent();
				});
			};

			saveModalRecommendsTable() {
				document.getElementById('recommend_modal_save_btn').addEventListener('click', async () => {
					if ($('#recommend_modal_select').val()) {
						const params = {
							type: 'attach_recommend'
						};
						let arr = [];
						document.querySelectorAll('.modal_recommend_checkbox').forEach((el) => {
							if (el.checked) {
								const item = {
									ord_mis_id: $('#recommend_modal_select').val(),
									recommend_id: el.value
								};
								arr.push(item);
							};
						});
						const data = {
							recommend: JSON.stringify(arr)
						};
						const url = this.convertUrl.pageUrl(this.url, params);
						this.responce.setUrl = url;
						const result = await this.responce.postData(data);
						console.log(result)
						this.order.recommend[$('#recommend_modal_select').val()] = result;
						console.log(this.order)
						this.orderPageContent.setOrderInfo = this.order;
						this.orderPageContent.createModalRecommendTable();
						this.orderPageContent.createOrderRecommendsTable();
						this.orderPageContent.alerts.setText = 'Методические рекоммендации к ошибке изменены!';
						this.orderPageContent.alerts.setSuccessBtnClass = "modal_recommend_success_btn"
						this.orderPageContent.alerts.sweetAlertSuccess();
						document.querySelector('.modal_recommend_success_btn').addEventListener('click', () => {
							this.orderPageContent.cleaneModalRecommendContent();
							$('#recommend_modal').modal('hide');
						});
					} else {
						this.orderPageContent.alerts.setText = 'Выберите ошибку и добавьте методические рекоммендации!';
						this.orderPageContent.alerts.sweetAlertError();
					};
				});
			};

			async commentNoteSelectDirector(value) {
				const button = document.getElementById('modal_comment_directors_search_btn');
				this.orderPageContent.loaderActive(button);
				const params = {
					type: 'get_directors',
					fio: value
				};
				console.log(value)
				const url = this.convertUrl.pageUrl(this.url, params)
				this.responce.setUrl = url;
				const result = await this.responce.getData();
				this.orderPageContent.setListDirectors = result;
				let timeout = null;
				clearTimeout(timeout);
				timeout = setTimeout(() => {
					this.orderPageContent.createDirectorsList();
					this.orderPageContent.oneCheck('.director_check');
				}, 300);
				document.getElementById('modal_comment_directors_search_btn').removeAttribute("data-kt-indicator");
				document.getElementById('modal_comment_directors_search_btn').disabled = false;
			};

			sendRecommendation() {
				if (document.getElementById('recommend_modal_send_btn')) {
					document.getElementById('recommend_modal_send_btn').addEventListener('click', (e) => {
						e.preventDefault();
						console.log('click')
						if (this.order.selected_mistakes.length > 0) {

							this.orderPageContent.alerts.setText = 'Методические рекоммендации будут направлены на почту сотруднику, совершившему ошибку!'
							this.orderPageContent.alerts.setConfirmBtnText = "Отправить!";
							this.orderPageContent.alerts.setConfirmBtnClass = 'recommends_start_btn';
							this.orderPageContent.alerts.sweetAlertTwobtn();
							if (document.querySelector('.recommends_start_btn')) {
								document.querySelector('.recommends_start_btn').addEventListener('click', async (e) => {
									e.preventDefault();
									console.log(this.order.recommend)
									const params = {
										type: 'send_mail',
										act_id: this.order.act_id
									};
									const data = {
										user_data: JSON.stringify({
											order_id: this.order.id,
											role: 6
										})
									};
									const url = this.convertUrl.pageUrl(this.url, params);
									console.log(url)
									this.responce.setUrl = url;
									const result = await this.responce.postData(data);
									if (result.type == "ok") {
										this.orderPageContent.alerts.setText = result.text + '!';
										this.orderPageContent.alerts.sweetAlertSuccess();
									} else {
										this.orderPageContent.alerts.setText = result.error + '!';
										this.orderPageContent.alerts.sweetAlertError()
									};
								});
							};
						};
					});
				};
			};

			actClose() {
				if (this.order.act_status == "Закрыт") {
					this.orderPageContent.actCloseContent();
				};
			};

			menuActive() {
				KTMenu.createInstances();
			};
		};

		class OrderPageContent {
			constructor() {
				this.template = new Template();
				this.alerts = new SweetAlerts();
				this.quillEditNote = new Quill('#quill_employee_note', {
					modules: {
						toolbar: [
							[{
								header: [1, 2, false]
							}],
							['bold', 'italic', 'underline'],
							['image', 'code-block']
						]
					},
					placeholder: 'Комментарий',
					theme: 'snow'
				});
				this.quillAddNote = new Quill('#quill_add_employee_note', {
					modules: {
						toolbar: [
							[{
								header: [1, 2, false]
							}],
							['bold', 'italic', 'underline'],
							['image', 'code-block']
						]
					},
					placeholder: 'Комментарий',
					theme: 'snow'
				});
				this.quillMistakeNote = new Quill('#quill_mistake_note', {
					modules: {
						toolbar: [
							[{
								header: [1, 2, false]
							}],
							['bold', 'italic', 'underline'],
							['image', 'code-block']
						]
					},
					placeholder: 'Комментарий',
					theme: 'snow'
				});
				this.quillDescription = new Quill('#quill_modal_description_note_edit', {
					modules: {
						toolbar: [
							[{
								header: [1, 2, false]
							}],
							['bold', 'italic', 'underline'],
							['image', 'code-block']
						]
					},
					placeholder: 'Комментарий',
					theme: 'snow'
				});

				this.quillAddComment = new Quill('#quill_modal_comment_note_add', {
					modules: {
						toolbar: [
							[{
								header: [1, 2, false]
							}],
							['bold', 'italic', 'underline'],
							['image', 'code-block']
						]
					},
					placeholder: 'Комментарий',
					theme: 'snow'
				});

				this.quillEditComment = new Quill('#quill_modal_comment_note_edit', {
					modules: {
						toolbar: [
							[{
								header: [1, 2, false]
							}],
							['bold', 'italic', 'underline'],
							['image', 'code-block']
						]
					},
					placeholder: 'Комментарий',
					theme: 'snow'
				});


				this.resolutionText = [{
					text: "резолюция не внесена",
					color: '#ffc700'
				}, {
					text: "ошибка не усмотрена",
					color: '#50cd89'
				}, {
					text: "усмотрена ошибка",
					color: '#f1416c'
				}];
				this.emps = null;
				this.listRecommends = null; //список рекомендаций, которые привязаны к ошибке, они не обязательно все будут в деле
				this.directors = null;
				this.closeMenu = new Menu();
			};

			/**
			 * @param {any} value
			 */
			set setOrderInfo(value) {
				this.orderInfo = value;
			};

			/**
			 * @param {any} value
			 */
			set setEmps(value) {
				this.emps = value;
			};

			/**
			 * @param {any} value
			 */
			set setMistakes(value) {
				this.mistakes = value;
			};

			/**
			 * @param {any} value
			 */
			set setListRecommends(value) {
				this.listRecommends = value;
			};

			/**
			 * @param {any} value
			 */
			set setListDirectors(value) {
				this.directors = value;
			};

			closeOpenMenu() {
				this.closeMenu.setTime = 1;
				this.closeMenu.createMenu();
			};

			addSelectedOrderContent() {
				console.log(this.orderInfo);
				document.getElementById('order_title').textContent = this.orderInfo.order_number;
				document.getElementById('order_breadscrumbs_act').textContent = this.orderInfo.act_number + ' ' + '(' + this.orderInfo.department_name + ')';
				document.getElementById('order_breadscrumbs_act_href').href = `/servcheck-akt-${this.orderInfo.act_id}`;
				document.getElementById('act_back_btn').href = `/servcheck-akt-${this.orderInfo.act_id}`;
				document.getElementById('order_breadscrumbs_order').textContent = this.orderInfo.order_number;
				document.getElementById('service_title').textContent = this.orderInfo.service_title;
				document.getElementById('mfc_name').textContent = this.orderInfo.mfc_name;
				document.getElementById('order_date').textContent = this.orderInfo.order_date;
				if (this.orderInfo.pk_pvd_number !== '0') {
					document.getElementById('pkpvd_number').textContent = this.orderInfo.pk_pvd_number;
				};
				// document.getElementById('modal_comment_body').textContent = this.orderInfo.comment
				this.addCommentsList();
				document.getElementById('description').textContent = this.orderInfo.description;
				if (!Array.isArray(this.orderInfo.user_resolution)) {
					this.addResolutionContent();
				};
				document.getElementById('user_display_name').textContent = this.orderInfo.user_display_name;
				document.getElementById('user_position').textContent = this.orderInfo.cpgu_user_position;
				document.getElementById('order').style.display = "block";
				this.addStepBtnLink();
				this.closeOpenMenu();
			};

			createCommentsItem(el) {
				const itemInitial = `<li class="d-flex align-items-start pb-2 comments_item">
													<div class="bullet bullet-dot h-6px w-6px me-5 mt-2"></div>
													<div class="me-5">${el.timestamp}</div>

													<div style="flex:1 1 55%">${el.comment}</div>
												</li>`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			addCommentsList() {
				const container = document.getElementById('comments_accordion_body');
				container.innerHTML = '';
				this.orderInfo.comment_order.forEach((el) => {
					const item = this.createCommentsItem(el);
					container.append(item);
				});
			};

			addEmployeeNoteTitle() {
				document.getElementById('add_title').textContent = "Объяснительная";
				this.quillAddNote.setText('');
			};

			editEmployeeNoteTitle(id) {
				document.getElementById('edit_title').textContent = "Объяснительная";
				this.quillNote.setText(JSON.parse(this.orderInfo.employee_note).text);
			};

			addEmployeeNoteContent() {
				const container = document.getElementById('employee_note');
				if (this.orderInfo.employee_note) {
					const noteList = JSON.parse(this.orderInfo.employee_note);
					console.log(noteList)
					container.innerHTML = '';
					console.log(noteList)

					noteList.forEach((el, index) => {
						const item = this.createEmployeeNoteContentItem(el, index);
						container.append(item);
					})

				} else {
					container.innerHTML = '';
					this.quillEditNote.setText('');
				}
				// const item = this.createEmployeeNoteContentItem();
				// document.getElementById('employee_note').textContent = this.orderPageContent.orderInfo.employee_note;
			}
			createEmployeeNoteContentItem(el, index) {
				const itemInitial = `	<div>											
												<div class="d-flex flex-row-fluid flex-wrap">
													<!--begin:Author-->
													    <div class="me-2 card h-100" style="flex: 1 1 85%;">														
															<div class="fw-semibold d-block text-gray-700">${el.text}</div>
														</div>
														<div class="me-0 employee_note_menu" style="display:none">
															<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary action-menu_btn" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
																		<rect x="10" y="3" width="4" height="4" rx="2" fill="currentColor" />
																		<rect x="10" y="17" width="4" height="4" rx="2" fill="currentColor" />
																	</svg>
																</span> </button>
															<!--begin::Menu 3-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
																<!--begin::Heading-->
																<div class="menu-item px-3">
																	<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
																		Действия
																	</div>
																</div>
																<!--end::Heading-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="" class="menu-link px-3 employee_note_edit_btn" data-index="${index}" style="display:'block">
																		Редактировать
																	</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="" class="menu-link px-3 employee_note_del_btn" data-index="${index}">
																		Удалить
																	</a>
																</div>

																<!--end::Menu item-->
															

															<!--end:Author-->
														</div>
													</div>

												</div>
												<div> <span class="text-dark fw-bold fs-6 me-2">Автор:</span>${el.author}
												</div>
												<div> <span class="text-dark fw-bold fs-6 me-2">Дата:</span>${el.date}</div>

												<div class="separator separator-dashed my-4"></div>
												<!--end::Section-->
											
										</div>`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			addCommentNoteContent() {
				console.log(this.orderInfo.comment)
				const container = document.getElementById('modal_comment_body');
				if (this.orderInfo.comment) {
					console.log(this.orderInfo.comment)
					const noteList = JSON.parse(this.orderInfo.comment);
					console.log(noteList)
					container.innerHTML = '';
					console.log(noteList)

					noteList.forEach((el, index) => {
						const item = this.createCommentNoteContentItem(el, index);
						container.append(item);
					})

				} else {
					container.innerHTML = '';
					this.quillAddComment.setText('');
				};
				// const item = this.createEmployeeNoteContentItem();
				// document.getElementById('employee_note').textContent = this.orderPageContent.orderInfo.employee_note;
			}

			addStepBtnLink() {
				const btn = document.getElementById('next-order_btn')
				const step = JSON.parse(this.orderInfo.step_resolution);
				if (step.type == 'ok') {
					btn.href = step.text;
					console.log(step.text)
					btn.style.display = 'block';
				} else if (step.type == 'error') {
					btn.style.display = 'none';
				};
			};

			createCommentNoteContentItem(el, index) {
				const itemInitial = `	<div>											
												<div class="d-flex flex-row-fluid flex-wrap">
													<!--begin:Author-->
													    <div class="me-2 card h-100" style="flex: 1 1 85%;">														
															<div class="fw-semibold d-block text-gray-700">${el.text}</div>
														</div>
														<div class="me-0 comment_note_menu" style="display:none">
															<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary action-menu_btn" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
																		<rect x="10" y="3" width="4" height="4" rx="2" fill="currentColor" />
																		<rect x="10" y="17" width="4" height="4" rx="2" fill="currentColor" />
																	</svg>
																</span> </button>
															<!--begin::Menu 3-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="" >
																<!--begin::Heading-->
																<div class="menu-item px-3">
																	<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
																		Действия
																	</div>
																</div>
																<!--end::Heading-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="" class="menu-link px-3 comment_note_edit_btn" data-index="${index}"  >
																		Редактировать
																	</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="" class="menu-link px-3 comment_note_del_btn" data-index="${index}" >
																		Удалить
																	</a>
																</div>

																<!--end::Menu item-->
															

															<!--end:Author-->
														</div>
													</div>

												</div>
												<div> <span class="text-dark fw-bold fs-6 me-2">Автор:</span>${el.author}
												</div>
												<div> <span class="text-dark fw-bold fs-6 me-2">Дата:</span>${el.date}</div>

												<div class="separator separator-dashed my-4"></div>
												<!--end::Section-->
											
										</div>`;
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			// addCommentNoteContent() {
			// 	document.getElementById('edit_title').textContent = "Пояснительная";
			// 	this.quillNote.setText(this.orderInfo.comment);
			// };

			addDescriptionNoteContent() {
				this.quillDescription.setText(this.orderInfo.description);
			};

			createMistakeItem(el, critical) {
				const itemInitial = `<div>
												<div class="d-flex flex-stack">
													<div class="d-flex align-items-center flex-row-fluid flex-wrap">
														<!--begin:Author-->
														<div class="me-2" style="flex: 1 1 85%;"><span class="text-dark fw-bold fs-6 me-2">${el.cat_name}</span>

																<span class="fw-semibold d-block text-gray-700">${el.mis_name}</span>
														</div>
														<div style: flex:1 1 %;><span class="fw-bold ">${critical}</span></div>
														<!--end:Author-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												<div class="separator separator-dashed my-4"></div>	</div>`;

				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			addMistakeList() {
				const container = document.getElementById('order_mistakes_list');
				container.innerHTML = '';
				this.orderInfo.selected_mistakes.forEach((el) => {
					let critical = '';
					if (el.critical == 1) {
						critical = `<span class="svg-icon svg-icon-muted svg-icon-2hx text-danger"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"/>
<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
</svg>
</span>`;
					}
					const item = this.createMistakeItem(el, critical);
					container.append(item);
				})
			};

			loaderActive(button) {
				// const button = document.getElementById('emps-search_btn');
				button.setAttribute("data-kt-indicator", "on");
				button.disabled = true;
			};



			createEmpsItem(el) {
				const itemInitial = `
												<div class="d-flex flex-stack emp_item">
													<div class="d-flex align-items-center flex-row-fluid flex-wrap" style="width: 50%";>
													<div class="form-check me-3">
    <input class="form-check-input guilty_check" type="checkbox" value="" id="flexCheckDefault" data-empid="${el.id}" data-username="${el.display_name}" data-position="${el.position}"/>   
</div>
														<!--begin:Author-->
														<div class="me-2" style="flex: 1 1 60%"><span class="text-dark fw-bold fs-6 me-2" >${el.display_name}</span>
															<span class="fw-bold "></span>

																<span class="fw-semibold d-block text-gray-700">${el.position}</span>
														</div>
														<!--end:Author-->
													</div>
													<!--end::Section-->
												</div>`

				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			createSearchNoResultText(el) {
				const itemInitial = `<div class="text-danger">${el.text}</div>`
				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			addSearchEmpsList() {
				const container = document.getElementById('search-emps_list');
				container.innerHTML = '';
				if (this.emps.type !== "error") {
					this.emps.forEach((el) => {
						const emp = this.createEmpsItem(el);
						container.append(emp);
					});
				} else {
					const dangertext = this.createSearchNoResultText(this.emps)
					container.append(dangertext);
				};

			};


			cleaneEmpsModal() {
				document.getElementById('search-emps_form').reset();
				document.getElementById('search-emps_list').innerHTML = '';
			};

			addCategoriesMistakes() {
				const categoriesMistakes = JSON.parse(this.orderInfo.categories);
				categoriesMistakes.forEach((el) => {
					const option = this.createOption(el.name, el.id);
					document.getElementById('mistakes_category').append(option);
				});
			};

			createOption(name, id) {
				const optionInitial = `
                <option class="option" value="${id}">${name}</option>`;
				this.template.setTemplate = optionInitial;
				const optionTemplate = this.template.createFromTemplate();
				return optionTemplate;
			};

			addMistakes() {
				$('#mistakes').html('').select2({
					data: [{
						id: '',
						text: ''
					}]
				});
				$('#mistakes').val(null).trigger('change');
				this.mistakes.forEach((el) => {
					const option = this.createOption(el.description, el.id);
					document.getElementById('mistakes').append(option);
				});
				const option = this.createOption('+ Добавить новую ошибку', 'new');
				document.getElementById('mistakes').prepend(option);
				document.getElementById('mistakes_container').style.display = 'block';
			};

			addNewMistakesInput() {
				$('#mistakes').on('select2:select', (e) => {

					if ($('#mistakes').val() == 'new') {
						document.getElementById('new-mistakes_container').style.display = 'block';
					} else {
						document.getElementById('new-mistakes_container').style.display = 'none';
						document.getElementById('new-mistakes_input').value = '';
					}
				});
			};

			addMistakeBtn() {
				$('#mistakes').on('select2:select', (e) => {
					document.getElementById('add-mistakes_btn').removeAttribute("disabled");
				});
			};

			createMistakesModalItem(el) {
				const itemInitial = `<div class="mis_modal_item text-hover-primary">
												<div class="d-flex flex-stack">
													<div class="d-flex align-items-center flex-row-fluid flex-wrap">
														<!--begin:Author-->
														<div class="me-2" style="flex: 1 1 90%;"><span class=" fw-bold fs-6 me-2">${el.cat_name}</span>
																															<span class="fw-semibold d-block">${el.mis_name}</span>
														</div>
														<!--end:Author-->
													</div>
													<!--end::Section-->
													<div style="flex: 1 1 10%; text-align:end">
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
																					<a data-mis-edit-id="${el.mis_id}" class="menu-link px-3 mistakes_edit_btn">
                                                                                          Изменить
                                                                                        </a>
                                                                                    </div>
                                                                                    <!--end::Menu item-->
                                                                                    <!--begin::Menu item-->
                                                                                    <div class="menu-item px-3">
																					<a class="menu-link px-3 mistakes_delete_btn" data-mis-del-id="${el.mis_id}">
                                                                                            Удалить
                                                                                        </a>
                                                                                    </div>
                                                                                    <!--end::Menu item-->
                                                                                </div>
                                                                            </div> </div>     </div>
																							<div class="separator separator-dashed my-4"></div>	</div>`
				this.template.setTemplate = itemInitial;
				const optionTemplate = this.template.createFromTemplate();
				return optionTemplate;
			};

			addMistakesModalList() {
				const container = document.getElementById('mistakes_modal_list');
				container.innerHTML = '';
				this.orderInfo.selected_mistakes.forEach((el) => {
					const item = this.createMistakesModalItem(el);
					container.append(item);
				});
			};

			cleaneMistakesCategories() {
				$('#mistakes_category').val(null).trigger('change');
				$('#mistakes').val(null).trigger('change');
				document.getElementById('new-mistakes_input').value = '';
				document.getElementById('new-mistakes_container').style.display = 'none';
				document.getElementById('add-mistakes_btn').setAttribute("disabled", "disabled");
				document.getElementById('mistakes_container').style.display = 'none';

			};

			addCategoriesMistakesNote() {
				const categoriesMistakes = JSON.parse(this.orderInfo.categories);
				categoriesMistakes.forEach((el) => {
					const option = this.createOption(el.name, el.id);
					document.getElementById('mistakes_note_category').append(option);
				});
			};

			addModalSelectCriticalList() {
				const container = document.getElementById('select-critical_modal_list');
				container.innerHTML = '';
				this.orderInfo.selected_mistakes.forEach((el, index) => {
					let check = '';
					if (el.critical == 1) {
						check = 'checked';
					};
					const item = this.createModalSelectCriticalItem(el, index, check);
					container.append(item);
				})
			};

			createModalSelectCriticalItem(el, index, check) {
				const itemInitial = `<tr><td>
																			<div class="form-check">
																				<input class="form-check-input select-critical_modal_check" type="checkbox" value="${el.id}" id="flexCheckChecked" ${check} />
																				
																			</div>
																		</td>
																		<td>${index+1}</td>
																		<td><span class="text-dark fw-bold fs-6 me-2">${el.cat_name}</span> <br>
																		${el.mis_name}
																		</td>
																		
																	</tr>`;
				this.template.setTemplate = itemInitial;
				const optionTemplate = this.template.createFromTemplate();
				return optionTemplate;
			};

			addRecommendSelectOptions() {
				document.getElementById('recommend_modal_table').style.display = 'block';
				const container = document.getElementById('recommend_modal_select');
				container.innerHTML = '';
				this.orderInfo.selected_mistakes.forEach((el) => {
					const item = this.createOption(el.mis_name, el.id);
					container.append(item);
				});
				$("#recommend_modal_select").val(null).trigger('change');
			};

			createModalRecommendTable() {
				const container = document.getElementById('recommend_modal_table_body');
				container.innerHTML = '';
				if (this.listRecommends.length > 0) {
					let check = '';
					this.listRecommends.forEach((el) => {
						if (this.orderInfo.recommend[$('#recommend_modal_select').val()]) {
							const arr = this.orderInfo.recommend[$('#recommend_modal_select').val()].filter((item) => item.recommend_id == el.id);
							if (arr.length > 0) {
								check = "checked";
							} else {
								check = '';
							};
						};
						const item = this.createModalRecommendTableItem(el, check);
						container.append(item);
					});
				};
			};

			createModalRecommendTableItem(el, check) {
				const itemInitial = `<tr>
															<td><div class="form-check">
    <input class="form-check-input modal_recommend_checkbox" type="checkbox" value="${el.id}" id="flexCheckDefault"  ${check} />
    <label class="form-check-label" for="flexCheckDefault">
      </label>
</div></td>
															<td>${el.name}</td>
														</tr>`;
				this.template.setTemplate = itemInitial;
				const optionTemplate = this.template.createFromTemplate();
				return optionTemplate;
			};

			createOrderRecommendsTable() {
				const container = document.getElementById('recommends_table_body');
				container.innerHTML = '';
				if (this.orderInfo.selected_mistakes.length > 0) {
					this.orderInfo.selected_mistakes.forEach((el, index) => {
						let comments = '';
						if (this.orderInfo.recommend[el.id].length > 0) {
							console.log(this.orderInfo.recommend[el.id])
							this.orderInfo.recommend[el.id].forEach((item) => {
								comments += `<div class="mb-5">${item.name}</div>`
							});
							const item = this.createOrderRecommendsTableItem(el, comments);
							container.append(item);
						};
					});
				} else {
					// console.log('rrr');
				};
			};

			createOrderRecommendsTableItem(el, comments) {
				const itemInitial = `	<tr style="color:#5E6278" >
															<td class="recommends_mistakes_container"><span class="fw-bold fs-6 text-gray-800">${el.cat_name}</span><br>${el.mis_name}</td>
															<td class="recommends_comments_container_27" >${comments}
															</td>
														</tr>`;
				this.template.setTemplate = itemInitial;
				const optionTemplate = this.template.createFromTemplate();
				return optionTemplate;
			};

			cleaneModalRecommendContent() {
				$('#recommend_modal_select').val(null).trigger('change');
				document.getElementById('recommend_modal_table_body').innerHTML = '';
			};

			createDirectorsList() {
				const container = document.getElementById('search-directors_list');
				container.innerHTML = '';
				if (this.directors.count !== 0) {
					this.directors.users.forEach((el) => {
						const emp = this.createDirectorItem(el);
						container.append(emp);
					})
				} else {
					const dangertext = this.createSearchNoResultText(this.directors)
					container.append(dangertext);
				};
			};

			createDirectorItem(el) {
				const itemInitial = `
												<div class="d-flex flex-stack emp_item">
													<div class="d-flex align-items-center flex-row-fluid flex-wrap" style="width: 50%";>
													<div class="form-check me-3">
    <input class="form-check-input director_check" type="checkbox" value="" id="flexCheckDefault" data-username="${el.displayname}"/>   
</div>
														<!--begin:Author-->
														<div class="me-2" style="flex: 1 1 60%"><span class="text-dark fw-bold fs-6 me-2" >${el.displayname}</span>
															<span class="fw-bold "></span>

																<span class="fw-semibold d-block text-gray-700">${el.title}, ${el.department}</span>
														</div>
														<!--end:Author-->
													</div>
													<!--end::Section-->
												</div>`

				this.template.setTemplate = itemInitial;
				const itemTemplate = this.template.createFromTemplate();
				return itemTemplate;
			};

			addResolutionContent() {
				document.getElementById('resolution_text').textContent = this.orderInfo.user_resolution.member_resolution;
				this.resolutionText.forEach((el) => {
					if (el.text == this.orderInfo.user_resolution.member_resolution) {
						document.getElementById('resolution_text').style.color = el.color;
					};
				});
			};

			oneCheck(value) {
				document.querySelectorAll(`${value}`).forEach((el) => {
					el.addEventListener('change', () => {
						if (el.checked) {
							document.querySelectorAll(`${value}`).forEach((it) => {
								it.setAttribute('disabled', 'disabled');
							})
							el.removeAttribute('disabled');
						} else {
							document.querySelectorAll(`${value}`).forEach((it) => {
								it.removeAttribute('disabled');
							});
						};
					});
				});
			};

			cleaneGuiltySearchInput() {
				document.getElementById('emps-search-cleane_btn').addEventListener('click', () => {
					document.getElementById('emps-search_input').value = '';
				})
			};

			ModalNoteContentCleane() {
				document.getElementById('modal_comment_directors_search_input').value = '';
				document.getElementById('modal_comment_directors_search-danger-text').textContent = '';
				document.getElementById('search-directors_list').innerHTML = '';
			};

			selectsParentsModal() {
				$("#recommend_modal_select").select2({
					tags: true,
					dropdownParent: $("#recommend_modal")
				});

				$("#mistakes_category").select2({
					tags: true,
					dropdownParent: $("#add_mistakes_modal")
				});

				$("#mistakes").select2({
					tags: true,
					dropdownParent: $("#add_mistakes_modal")
				});

				$("#mistakes_note_category").select2({
					tags: true,
					dropdownParent: $("#modal_mistakes_note")
				});

				$("#modal_comment_directors_select").select2({
					tags: true,
					dropdownParent: $("#modal_comment_directors")
				});

				$("#resolution_category").select2({
					tags: true,
					dropdownParent: $("#resolution_modal")
				});
			};

			buttonsBlock() {
				// 	if (document.getElementById('modal_note_ask_btn')) {
				// 		document.getElementById('modal_note_ask_btn').setAttribute('disabled', 'disabled')
				// 	};
				// 	if (document.getElementById('comment_note_request_btn')) {
				// 		document.getElementById('comment_note_request_btn').setAttribute('disabled', 'disabled');
				// 	};
				// 	if (document.getElementById('recommend_modal_send_btn')) {
				// 		document.getElementById('recommend_modal_send_btn').setAttribute('disabled', 'disabled');
				// 	};
			};

			actCloseContent() {
				if (document.getElementById('modal_note_ask_btn')) {
					document.getElementById('modal_note_ask_btn').style.display = 'none';
				};
				// if (document.getElementById('employee_note_edit_btn')) {
				// 	document.getElementById('employee_note_edit_btn').style.display = 'none';
				// };
				if (document.getElementById('comment_note_request_btn')) {
					document.getElementById('comment_note_request_btn').style.display = 'none';
				};
				if (document.getElementById('comment_note_edit_btn')) {
					document.getElementById('comment_note_edit_btn').style.display = 'none';
				};
				if (document.getElementById('description_note_edit_btn')) {
					document.getElementById('description_note_edit_btn').style.display = 'none';
				};
				if (document.getElementById('recommend_modal_open_btn')) {
					document.getElementById('recommend_modal_open_btn').style.display = 'none';
				};
				if (document.getElementById('recommend_modal_send_btn')) {
					document.getElementById('recommend_modal_send_btn').style.display = 'none';
				};
				if (document.getElementById('edit_employer_btn')) {
					document.getElementById('edit_employer_btn').style.display = 'none';
				};
				if (document.getElementById('edit_mistake_btn')) {
					document.getElementById('edit_mistake_btn').style.display = 'none';
				};
			}
			menuActive() {
				KTMenu.createInstances();
			};
		};




		document.addEventListener("DOMContentLoaded", () => {
			const servChecOrderApp = new ServCheckOrderApp;
			servChecOrderApp.createServCheckOrderApp();

		});
	</script>
	<!--end::jsCustom js by this page-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>