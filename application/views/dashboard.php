<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Dashboard</li>
                            </ul>
                        </div>
                        <form class="au-form-icon--sm" action="" method="post">
                            <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                            <button class="au-btn--submit2" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- END BREADCRUMB-->

        <!-- WELCOME-->
        <section class="welcome p-t-10">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Welcome back
                            <span>John!</span>
                        </h1>
                        <hr class="line-seprate">
                        <hr>
                    </div>
                </div>
            </div>
           
        </section>
        <!-- END WELCOME-->
        <div class="row">
            <div class="col-lg-6">
                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3>
                            <i class="zmdi zmdi-account-calendar"></i><?= date("d M Y") ?></h3>
                        <button class="au-btn-plus">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    </div>
                    <div class="au-task js-list-load">
                        <div class="au-task__title">
                            <p>Jadwal Inspeksi</p>
                        </div>
                        <div class="au-task-list js-scrollbar3">
                            <div class="au-task__item au-task__item--danger">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                    </h5>
                                    <span class="time">10:00 AM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--warning">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="#">Create new task for Dashboard</a>
                                    </h5>
                                    <span class="time">11:00 AM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--primary">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                    </h5>
                                    <span class="time">02:00 PM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--success">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="#">Create new task for Dashboard</a>
                                    </h5>
                                    <span class="time">03:30 PM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--danger js-load-item">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                    </h5>
                                    <span class="time">10:00 AM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--warning js-load-item">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="#">Create new task for Dashboard</a>
                                    </h5>
                                    <span class="time">11:00 AM</span>
                                </div>
                            </div>
                        </div>
                        <div class="au-task__footer">
                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3>
                            <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                        <button class="au-btn-plus">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    </div>
                    <div class="au-inbox-wrap js-inbox-wrap">
                        <div class="au-message js-list-load">
                            <div class="au-message__noti">
                                <p>You Have
                                    <span>2</span>

                                    new messages
                                </p>
                            </div>
                            <div class="au-message-list">
                                <div class="au-message__item unread">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap">
                                                <div class="avatar">
                                                    <img src="<?= base_url() ?>assets/images/icon/avatar-02.jpg" alt="John Smith">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">John Smith</h5>
                                                <p>Have sent a photo</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>12 Min ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item unread">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap online">
                                                <div class="avatar">
                                                    <img src="<?= base_url() ?>assets/images/icon/avatar-03.jpg" alt="Nicholas Martinez">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Nicholas Martinez</h5>
                                                <p>You are now connected on message</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>11:00 PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap online">
                                                <div class="avatar">
                                                    <img src="<?= base_url() ?>assets/images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Michelle Sims</h5>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>Yesterday</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap">
                                                <div class="avatar">
                                                    <img src="<?= base_url() ?>assets/images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Michelle Sims</h5>
                                                <p>Purus feugiat finibus</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>Sunday</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item js-load-item">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap online">
                                                <div class="avatar">
                                                    <img src="<?= base_url() ?>assets/images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Michelle Sims</h5>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>Yesterday</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item js-load-item">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap">
                                                <div class="avatar">
                                                    <img src="<?= base_url() ?>assets/images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Michelle Sims</h5>
                                                <p>Purus feugiat finibus</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>Sunday</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="au-message__footer">
                                <button class="au-btn au-btn-load js-load-btn">load more</button>
                            </div>
                        </div>
                        <div class="au-chat">
                            <div class="au-chat__title">
                                <div class="au-chat-info">
                                    <div class="avatar-wrap online">
                                        <div class="avatar avatar--small">
                                            <img src="<?= base_url() ?>assets/images/icon/avatar-02.jpg" alt="John Smith">
                                        </div>
                                    </div>
                                    <span class="nick">
                                        <a href="#">John Smith</a>
                                    </span>
                                </div>
                            </div>
                            <div class="au-chat__content">
                                <div class="recei-mess-wrap">
                                    <span class="mess-time">12 Min ago</span>
                                    <div class="recei-mess__inner">
                                        <div class="avatar avatar--tiny">
                                            <img src="<?= base_url() ?>assets/images/icon/avatar-02.jpg" alt="John Smith">
                                        </div>
                                        <div class="recei-mess-list">
                                            <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                            <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="send-mess-wrap">
                                    <span class="mess-time">30 Sec ago</span>
                                    <div class="send-mess__inner">
                                        <div class="send-mess-list">
                                            <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="au-chat-textfield">
                                <form class="au-form-icon">
                                    <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                    <button class="au-input-icon">
                                        <i class="zmdi zmdi-camera"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">data table</h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="property">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="time">
                                        <option selected="selected">Today</option>
                                        <option value="">3 Days</option>
                                        <option value="">1 Week</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                            </div>
                            <div class="table-data__tool-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item</button>
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type">
                                        <option selected="selected">Export</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>description</th>
                                        <th>date</th>
                                        <th>status</th>
                                        <th>price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>Lori Lynch</td>
                                        <td>
                                            <span class="block-email">lori@example.com</span>
                                        </td>
                                        <td class="desc">Samsung S8 Black</td>
                                        <td>2018-09-27 02:12</td>
                                        <td>
                                            <span class="status--process">Processed</span>
                                        </td>
                                        <td>$679.00</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>Lori Lynch</td>
                                        <td>
                                            <span class="block-email">john@example.com</span>
                                        </td>
                                        <td class="desc">iPhone X 64Gb Grey</td>
                                        <td>2018-09-29 05:57</td>
                                        <td>
                                            <span class="status--process">Processed</span>
                                        </td>
                                        <td>$999.00</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>Lori Lynch</td>
                                        <td>
                                            <span class="block-email">lyn@example.com</span>
                                        </td>
                                        <td class="desc">iPhone X 256Gb Black</td>
                                        <td>2018-09-25 19:03</td>
                                        <td>
                                            <span class="status--denied">Denied</span>
                                        </td>
                                        <td>$1199.00</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>Lori Lynch</td>
                                        <td>
                                            <span class="block-email">doe@example.com</span>
                                        </td>
                                        <td class="desc">Camera C430W 4k</td>
                                        <td>2018-09-24 19:10</td>
                                        <td>
                                            <span class="status--process">Processed</span>
                                        </td>
                                        <td>$699.00</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END DATA TABLE-->