<div id="sidebar-menu">
    <ul class="metismenu" id="side-menu">
        <li>
            <a href="{{route('admin.home')}}">
                <i class="mdi mdi-view-dashboard"></i>
                <span> الرئيسية </span>
            </a>
        </li>
{{--        <li class="menu-title">الصلاحيات</li>--}}
{{--        <li>--}}
{{--            <a href="javascript: void(0);">--}}
{{--                <i class="mdi mdi-controller-classic"></i>--}}
{{--                <span> إدارة الصلاحيات </span>--}}
{{--                <span class="menu-arrow"></span>--}}
{{--            </a>--}}
{{--            <ul class="nav-second-level" aria-expanded="false">--}}
{{--                <li><a href="{{route('admin.roles.create')}}">إضافة صلاحية جديدة</a></li>--}}
{{--                <li><a href="{{route('admin.roles.index')}}">عرض الكل</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="javascript: void(0);">--}}
{{--                <i class="mdi mdi-office-building"></i>--}}
{{--                <span> الإدارة </span>--}}
{{--                <span class="menu-arrow"></span>--}}
{{--            </a>--}}
{{--            <ul class="nav-second-level" aria-expanded="false">--}}
{{--                <li><a href="{{route('admin.admins.create')}}">إضافة مدير جديدة</a></li>--}}
{{--                <li><a href="{{route('admin.admins.index')}}">عرض الكل</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <li class="menu-title">أعضاء النظام</li>
        <li>
            <a href="{{route('admin.user.index')}}">
                <i class="mdi mdi-human"></i>
                <span> إدارة المستخدمين </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="mdi mdi-home-currency-usd"></i>
                <span> إدارة مزودى الخدمات </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{route('admin.provider.binned')}}">طلبات الإنضمام</a></li>
                <li><a href="{{route('admin.provider.index')}}">مزودى الخدمات بالتطبيق</a></li>
            </ul>
        </li>

        <li class="menu-title">محتويات النظام</li>
        <li>
            <a href="{{route('admin.category.index')}}">
                <i class="mdi mdi-box-shadow"></i>
                <span> إدارة التصنيفات الرئيسية </span>
            </a>
        </li>

        <li>
            <a href="{{route('admin.sub_category.index')}}">
                <i class="mdi mdi-box-shadow"></i>
                <span> إدارة التصنيفات الفرعية </span>
            </a>
        </li>

        <li>
            <a href="{{route('admin.notification.index')}}">
                <i class="mdi mdi-alert-octagram"></i>
                <span> إدارة الإشعارات الجماعية </span>
            </a>
        </li>

        <li>
            <a href="{{route('admin.package.index')}}">
                <i class="mdi mdi-apps-box"></i>
                <span> الباقات </span>
            </a>
        </li>

        <li>
            <a href="{{route('admin.promo_code.index')}}">
                <i class="mdi mdi-qrcode"></i>
                <span> إدارة أكواد الخصم </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="mdi mdi-home-currency-usd"></i>
                <span> إدارة الحوالات البنكية </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{route('admin.package_user.index')}}">اشتراكات مقدمي الخدمات</a></li>
                <li><a href="{{route('admin.transfer.index')}}">نسبة التطبيق للمستخدمين</a></li>
            </ul>
        </li>

        <li>
            <a href="{{route('admin.contact.index')}}">
                <i class="mdi mdi-mailbox"></i>
                <span> إدارة رسائل التواصل </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="mdi mdi-share-variant"></i>
                <span> إعدادات أخرى </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level nav" aria-expanded="false">
                <li>
                    <a href="{{route('admin.settings.edit')}}">الإعدادات العامة</a>
                </li>
                <li>
                    <a href="{{route('admin.socials.index')}}">روابط التواصل الاجتماعي</a>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">الصفحات
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.page.edit',['type'=>'about','for'=>'all'])}}">عن التطبيق</a>
                        </li>
                        <li>
                            <a href="{{route('admin.page.edit',['type'=>'percent','for'=>'all'])}}">عمولة التطبيق</a>
                        </li>
                        <li>
                            <a href="{{route('admin.page.edit',['type'=>'terms','for'=>'user'])}}">الشروط والأحكام للمستخدم</a>
                        </li>
                        <li>
                            <a href="{{route('admin.page.edit',['type'=>'terms','for'=>'provider'])}}">الشروط والأحكام لمقدم الخدمة</a>
                        </li>
                        <li>
                            <a href="{{route('admin.page.edit',['type'=>'licence','for'=>'user'])}}">سياسة الخصوصية للمستخدم</a>
                        </li>
                        <li>
                            <a href="{{route('admin.page.edit',['type'=>'licence','for'=>'provider'])}}">سياسة الخصوصية لمقدم الخدمة</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.contact_type.index')}}">أنواع التواصل</a>
                </li>
                <li>
                    <a href="{{route('admin.city.index')}}">المدن</a>
                </li>
                <li>
                    <a href="{{route('admin.bank.index')}}">الحسابات البنكية</a>
                </li>
                <li>
                    <a href="{{route('admin.slider.index')}}">الإعلانات</a>
                </li>

            </ul>
        </li>
    </ul>

</div>
