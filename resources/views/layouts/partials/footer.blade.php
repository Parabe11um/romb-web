<!-- /.content-wrapper -->
<footer class="bg-[rgba(52,63,82)] opacity-100 !text-[#cacaca]">
    <div class="container pt-14 xl:pt-6 lg:pt-6 pb-16 xl:pb-20 lg:pb-20 md:pb-20">
        <div class="xl:!flex lg:!flex flex-row xl:!items-center lg:!items-center">
            <h3 class="xl:!text-[2.1rem] !text-[calc(1.335rem_+_1.02vw)] !leading-[1.2] !mb-6 lg:!mb-0 xl:!mb-0 xl:!pr-40 lg:!pr-40 xxl:!pr-[22.5rem] !text-white">
                Создаём, развиваем и поддерживаем сайты, которые работают на бизнес.</h3>
        </div>
        <!--/div -->
        <hr class="!mt-[3rem] !mb-[3.5rem] opacity-100 m-[4.5rem_0] border-t border-solid border-[rgba(164,174,198,.2)]">
        <div class="flex flex-wrap mx-[-15px] !mt-[-30px] xl:!mt-0 lg:!mt-0">
            <div
                class="md:w-4/12 xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] !px-[15px] max-w-full xl:!mt-0 lg:!mt-0 !mt-[30px]">
                <div class="widget !text-[#cacaca]">
                    <img class="!mb-4" src="{{asset('images/logo.svg')}}" srcset="{{asset('images/logo.svg 2x')}}" alt="image">
                    <p class="!mb-4">© romb web. <br class="hidden xl:block lg:block !text-[#cacaca]">All rights
                        reserved.</p>
                    <!-- /.social -->
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div
                class="md:w-4/12 xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] !px-[15px] max-w-full xl:!mt-0 lg:!mt-0 !mt-[30px]">
                <div class="widget !text-[#cacaca]">
                    <h4 class="widget-title !text-white !mb-3">Для связи</h4>
                    <a class="!text-[#cacaca] hover:!text-[#5eb9f0]"
                       href="mailto:info@romb-web.ru">info@romb-web.ru</a>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div
                class="md:w-4/12 xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] !px-[15px] max-w-full xl:!mt-0 lg:!mt-0 !mt-[30px]">
                <div class="widget !text-[#cacaca]">
                    <h4 class="widget-title !text-white !mb-3">Страницы</h4>
                    <ul class="pl-0 list-none   !mb-0">
                        <li><a class="!text-[#cacaca] hover:!text-[#5eb9f0]" href="{{ route('about') }}">О нас</a></li>
                        <li class="!mt-[0.35rem]"><a class="!text-[#cacaca] hover:!text-[#5eb9f0]" href="{{ route('services.index') }}">Услуги</a></li>
                        <li class="!mt-[0.35rem]"><a class="!text-[#cacaca] hover:!text-[#5eb9f0]" href="{{ route('projects.index') }}">Проекты</a>
                        </li>
                        <li class="!mt-[0.35rem]"><a class="!text-[#cacaca] hover:!text-[#5eb9f0]" href="{{ route('articles.index') }}">Статьи</a></li>
                        <li class="!mt-[0.35rem]"><a class="!text-[#cacaca] hover:!text-[#5eb9f0]" href="{{ route('privacy.policy') }}">Политика конфиденциальности</a></li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</footer>
<!-- progress wrapper -->
<button type="button" aria-label="Наверх" class="progress-wrap rw-button rw-scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102" aria-hidden="true">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</button>
