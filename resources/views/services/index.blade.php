@extends('layouts.app')

@section('content')
    <div class="grow shrink-0">
        @include('layouts.partials.header')
        <!-- /header -->
        <section class="wrapper !bg-[#edf2fc]">
            <div class="container pt-10 pb-36 xl:pt-[4.5rem] lg:pt-[4.5rem] md:pt-[4.5rem] xl:pb-40 lg:pb-40 md:pb-40 !text-center">
                <div class="flex flex-wrap mx-[-15px]">
                    <div class="md:w-8/12 lg:w-7/12 xl:w-6/12 xxl:w-5/12 w-full flex-[0_0_auto] !px-[15px] max-w-full !mx-auto !mb-12">
                        <h1 class="!text-[calc(1.365rem_+_1.38vw)] font-bold !leading-[1.2] xl:!text-[2.4rem] !mb-3">Наши услуги</h1>
                        <p class="lead !leading-[1.65] text-[0.9rem] font-medium lg:!px-7 xl:!px-7 xxl:!px-6">Полный цикл digital-услуг для бизнеса — от разработки сайта до продвижения и поддержки.<span class="relative z-[2] whitespace-nowrap after:content-[''] after:block after:absolute after:w-[102.5%] after:h-[30%] after:left-[-1.5%] after:z-[-1] after:transition-all after:duration-[0.2s] after:ease-in-out after:!mt-0 after:rounded-[5rem] after:bottom-[9%] motion-reduce:after:transition-none after:bg-[rgba(63,120,224,.12)]"></p>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->

        <section class="wrapper bg-gradient-sky">
            <div class="container pt-14 xl:pt-8 lg:pt-8 pb-[4.5rem] xl:pb-28 lg:pb-28 md:pb-28">
                <!-- /.row -->
                <div
                    class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px] !mt-[-60px] xxl:!px-5 !text-center items-end">

                    @foreach($services as $service)
                        <div
                            class="xl:w-4/12 lg:w-4/12 w-full flex-[0_0_auto] xl:!px-[35px] lg:!px-[20px] !px-[15px] max-w-full !mt-[60px]">

                            <div class="md:!px-20 lg:!px-3 xl:!px-3">

                                @if($service->image)
                                    <figure class="!mb-6">
                                        <img
                                            class="img-auto mx-auto"
                                            src="{{ asset('storage/' . $service->image) }}"
                                            alt="{{ $service->title }}">
                                    </figure>
                                @endif

                                <h3>{{ $service->title }}</h3>

                                <p class="!mb-2">
                                    {{ $service->excerpt }}
                                </p>

                                <a href="{{ route('services.show', $service) }}" class="more hover">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!--/.row -->
            </div>
            <!-- /.container -->
        </section>

        <section class="wrapper !bg-[#ffffff]  angled upper-end !relative border-0 before:top-[-4rem] before:border-l-transparent before:border-r-[100vw] before:border-t-[4rem] before:border-[#fefefe] before:content-[''] before:block before:absolute before:z-0 before:!border-y-transparent before:border-0 before:border-solid before:right-0 after:top-[-4rem] after:border-l-transparent after:border-r-[100vw] after:border-t-[4rem] after:border-[#fefefe] after:content-[''] after:block after:absolute after:z-0 after:!border-y-transparent after:border-0 after:border-solid after:right-0">
            <div class="container !pb-[4.5rem] xl:!pb-24 lg:!pb-24 md:!pb-24">
                <!-- /.row -->
                <div class="flex flex-wrap mx-[-15px] xl:mx-[-20px] lg:mx-[-20px] !mt-[25px] md:!mt-[4.5rem] lg:!mt-0 xl:!mt-0 !mb-20 items-center">
                    <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] px-[20px] !mt-[40px] max-w-full xl:!order-2 lg:!order-2">
                        <div class="flex flex-wrap mx-[-15px] xl:mx-[-12.5px] lg:mx-[-12.5px] md:mx-[-12.5px] !mt-[-25px]">
                            <div class="xl:w-4/12 lg:w-4/12 md:w-4/12 w-full flex-[0_0_auto] !px-[15px] max-w-full xl:!ml-[16.66666667%] lg:!ml-[16.66666667%] md:!ml-[16.66666667%] !self-end !mt-[25px]">
                                <figure class="rounded-[0.4rem]"><img class="rounded-[0.4rem]" src="{{asset("images/g1.jpg") }}" srcset="{{asset("images/g1.jpg")}}" alt="image"></figure>
                            </div>
                            <!--/column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[12.5px] max-w-full !self-end !mt-[25px]">
                                <figure class="rounded-[0.4rem]"><img class="rounded-[0.4rem]" src="{{asset("images/g2.jpg") }}" srcset="{{asset("images/g2.jpg")}}" alt="image"></figure>
                            </div>
                            <!--/column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[12.5px] max-w-full xl:!ml-[8.33333333%] lg:!ml-[8.33333333%] md:!ml-[8.33333333%] !mt-[25px]">
                                <figure class="rounded-[0.4rem]"><img class="rounded-[0.4rem]" src="{{asset("images/g3.jpg") }}" srcset="{{asset("images/g3.jpg")}}" alt="image"></figure>
                            </div>
                            <!--/column -->
                            <div class="xl:w-4/12 lg:w-4/12 md:w-4/12 w-full flex-[0_0_auto] !px-[15px] max-w-full !self-start !mt-[25px]">
                                <figure class="rounded-[0.4rem]"><img class="rounded-[0.4rem]" src="{{asset("images/g4.jpg") }}" srcset="{{asset("images/g4.jpg")}}" alt="image"></figure>
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!--/column -->
                    <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] xl:!px-[20px] lg:!px-[20px] !px-[15px] !mt-[40px] max-w-full">
                        <h2 class="!text-[calc(1.305rem_+_0.66vw)] font-bold xl:!text-[1.8rem] !leading-[1.3] !mb-3">What We Do?</h2>
                        <p class="lead !mb-8 xxl:!pr-2 !text-[1.05rem] !leading-[1.6]">The full service we are offering is <span class="relative z-[2] whitespace-nowrap after:content-[''] after:block after:absolute after:w-[102.5%] after:h-[30%] after:left-[-1.5%] after:z-[-1] after:transition-all after:duration-[0.2s] after:ease-in-out after:!mt-0 after:rounded-[5rem] after:bottom-[9%] motion-reduce:after:transition-none after:bg-[rgba(63,120,224,.12)]">specifically</span> designed to meet your business needs and projects.</p>
                        <div class="flex flex-wrap mx-[-15px] xl:mx-[-25px] !mt-[-30px]">
                            <div class="md:w-6/12 lg:w-full xl:w-6/12 w-full flex-[0_0_auto] xl:!px-[25px] !px-[15px] max-w-full !mt-[30px]">
                                <div class="flex flex-row">
                                    <div>
                                        <div class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mr-5 xl:!text-[1.3rem] w-12 h-12 !text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none p-0 !rounded-[100%]"> <i class="!text-[calc(1.255rem_+_0.06vw)] before:content-['\ec50'] uil uil-phone-volume"></i> </div>
                                    </div>
                                    <div>
                                        <h4 class="!mb-1">24/7 Support</h4>
                                        <p class="!mb-0">Nulla vitae elit libero pharetra augue dapibus.</p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                            <div class="md:w-6/12 lg:w-full xl:w-6/12 w-full flex-[0_0_auto] xl:!px-[25px] !px-[15px] max-w-full !mt-[30px]">
                                <div class="flex flex-row">
                                    <div>
                                        <div class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mr-5 xl:!text-[1.3rem] w-12 h-12 !text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none p-0 !rounded-[100%]"> <i class="!text-[calc(1.255rem_+_0.06vw)] before:content-['\ecb3'] uil uil-shield-exclamation"></i> </div>
                                    </div>
                                    <div>
                                        <h4 class="!mb-1">Secure Payments</h4>
                                        <p class="!mb-0">Vivamus sagittis lacus augue laoreet vel.</p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                            <div class="md:w-6/12 lg:w-full xl:w-6/12 w-full flex-[0_0_auto] xl:!px-[25px] !px-[15px] max-w-full !mt-[30px]">
                                <div class="flex flex-row">
                                    <div>
                                        <div class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mr-5 xl:!text-[1.3rem] w-12 h-12 !text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none p-0 !rounded-[100%]"> <i class="!text-[calc(1.255rem_+_0.06vw)] before:content-['\ebb2'] uil uil-laptop-cloud"></i> </div>
                                    </div>
                                    <div>
                                        <h4 class="!mb-1">Daily Updates</h4>
                                        <p class="!mb-0">Cras mattis consectetur purus sit amet.</p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                            <div class="md:w-6/12 lg:w-full xl:w-6/12 w-full flex-[0_0_auto] xl:!px-[25px] !px-[15px] max-w-full !mt-[30px]">
                                <div class="flex flex-row">
                                    <div>
                                        <div class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mr-5 xl:!text-[1.3rem] w-12 h-12 !text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none p-0 !rounded-[100%]"> <i class="!text-[calc(1.255rem_+_0.06vw)] before:content-['\e9d3'] uil uil-chart-line"></i> </div>
                                    </div>
                                    <div>
                                        <h4 class="!mb-1">Market Research</h4>
                                        <p class="!mb-0">Aenean lacinia bibendum nulla sed consectetur.</p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
                <h2 class="!text-[calc(1.305rem_+_0.66vw)] font-bold xl:!text-[1.8rem] !leading-[1.3] !mb-3">How We Do It?</h2>
                <p class="lead !mb-8 !text-[1.05rem] !leading-[1.6]">We make your spending <span class="relative z-[2] whitespace-nowrap after:content-[''] after:block after:absolute after:w-[102.5%] after:h-[30%] after:left-[-1.5%] after:z-[-1] after:transition-all after:duration-[0.2s] after:ease-in-out after:!mt-0 after:rounded-[5rem] after:bottom-[9%] motion-reduce:after:transition-none after:bg-[rgba(63,120,224,.12)]">stress-free</span> for you to have the perfect control.</p>
                <div class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px] !mt-[-30px] process-wrapper line">
                    <div class="md:w-6/12 lg:w-3/12 xl:w-3/12 w-full flex-[0_0_auto] !px-[15px] xl:!px-[35px] lg:!px-[20px] !mt-[30px] max-w-full !relative after:w-full after:absolute after:content-[''] after:h-px after:z-[1] after:border-t-[rgba(164,174,198,0.2)] after:border-t after:border-solid after:left-[3rem] after:top-6 after:bg-inherit max-lg:after:!hidden"> <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mb-4 !relative z-[2] xl:!text-[1.3rem] w-12 h-12 !text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none !p-0 !rounded-[100%]"><span class="number">01</span></span>
                        <h4 class="!mb-1">Concept</h4>
                        <p>Nulla vitae elit libero elit non porta gravida eget metus cras. Aenean eu leo quam. Pellentesque ornare.</p>
                    </div>
                    <!--/column -->
                    <div class="md:w-6/12 lg:w-3/12 xl:w-3/12 w-full flex-[0_0_auto] !px-[15px] xl:!px-[35px] lg:!px-[20px] !mt-[30px] max-w-full !relative after:w-full after:absolute after:content-[''] after:h-px after:z-[1] after:border-t-[rgba(164,174,198,0.2)] after:border-t after:border-solid after:left-[3rem] after:top-6 after:bg-inherit max-lg:after:!hidden"> <span class="icon btn btn-circle btn-lg btn-primary !text-white !bg-[#3f78e0] border-[#3f78e0] hover:text-white hover:bg-[#3f78e0] hover:!border-[#3f78e0]   active:text-white active:bg-[#3f78e0] active:border-[#3f78e0] disabled:text-white disabled:bg-[#3f78e0] disabled:border-[#3f78e0] pointer-events-none !mb-4 !relative z-[2] xl:!text-[1.3rem] w-12 h-12 !text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none p-0 !rounded-[100%]"><span class="number">02</span></span>
                        <h4 class="!mb-1">Prepare</h4>
                        <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis.</p>
                    </div>
                    <!--/column -->
                    <div class="md:w-6/12 lg:w-3/12 xl:w-3/12 w-full flex-[0_0_auto] !px-[15px] xl:!px-[35px] lg:!px-[20px] !mt-[30px] max-w-full !relative after:w-full after:absolute after:content-[''] after:h-px after:z-[1] after:border-t-[rgba(164,174,198,0.2)] after:border-t after:border-solid after:left-[3rem] after:top-6 after:bg-inherit max-lg:after:!hidden"> <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mb-4 !relative z-[2] xl:!text-[1.3rem] w-12 h-12 !text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none !p-0 !rounded-[100%]"><span class="number">03</span></span>
                        <h4 class="!mb-1">Retouch</h4>
                        <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero.</p>
                    </div>
                    <!--/column -->
                    <div class="md:w-6/12 lg:w-3/12 xl:w-3/12 w-full flex-[0_0_auto] !px-[15px] xl:!px-[35px] lg:!px-[20px] !mt-[30px] max-w-full"> <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mb-4 !relative z-[2] xl:!text-[1.3rem] w-12 h-12 !text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none !p-0 !rounded-[100%]"><span class="number">04</span></span>
                        <h4 class="!mb-1">Finalize</h4>
                        <p>Integer posuere erat, consectetur adipiscing elit. Fusce dapibus, tellus ac cursus commodo.</p>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->
        <section class="wrapper !bg-[#ffffff]  angled upper-end !relative border-0 before:top-[-4rem] before:border-l-transparent before:border-r-[100vw] before:border-t-[4rem] before:border-[#fefefe] before:content-[''] before:block before:absolute before:z-0 before:!border-y-transparent before:border-0 before:border-solid before:right-0 after:border-[#fefefe] after:content-[''] after:block after:absolute after:z-0 after:!border-y-transparent after:border-0 after:border-solid after:right-0">
            <div class="container py-[4.5rem] xl:!py-24 lg:!py-24 md:!py-24">
                <div class="flex flex-wrap mx-[-15px] !mt-[-50px] xl:mx-[-35px] lg:mx-[-20px] items-center">
                    <div class="xl:w-7/12 lg:w-7/12 w-full flex-[0_0_auto] xl:!px-[35px] lg:!px-[20px] !px-[15px] !mt-[50px] max-w-full !relative">
                        <div class="shape bg-dot primary rellax !w-[8rem] !h-[8rem] bg-[radial-gradient(#3f78e0_2px,transparent_2.5px)] absolute z-[1] opacity-50" data-rellax-speed="1" style="top: 0; left: -1.4rem; z-index: 0;"></div>
                        <div class="flex flex-wrap mx-[-15px] xl:mx-[-12.5px] lg:mx-[-12.5px] md:mx-[-12.5px] !mt-[-25px]">
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[12.5px] !mt-[25px] max-w-full">
                                <figure class="!rounded-[.4rem] xl:!mt-10 lg:!mt-10 md:!mt-10 !relative"><img class="!rounded-[.4rem]" src="./assets/img/photos/g5.jpg" srcset="./assets/img/photos/g5@2x.jpg 2x" alt="image"></figure>
                            </div>
                            <!--/column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[12.5px] !mt-[25px] max-w-full">
                                <div class="flex flex-wrap mx-[-15px] xl:mx-[-12.5px] lg:mx-[-12.5px] md:mx-[-12.5px] !mt-[-25px]">
                                    <div class="w-full flex-[0_0_auto] px-[12.5px] !mt-[25px] max-w-full xl:!order-2 lg:!order-2 md:!order-2">
                                        <figure class="rounded-[0.4rem]"><img class="rounded-[0.4rem]" src="./assets/img/photos/g6.jpg" srcset="./assets/img/photos/g6@2x.jpg 2x" alt="image"></figure>
                                    </div>
                                    <!--/column -->
                                    <div class="xl:w-10/12 lg:w-10/12 md:w-10/12 w-full flex-[0_0_auto] px-[12.5px] !mt-[25px] max-w-full">
                                        <div class="card !bg-[#e0e9fa] !text-center">
                                            <div class="card-body !py-12 !px-[2rem] counter-wrapper">
                                                <h3 class="counter !whitespace-nowrap xl:!text-[2rem] !text-[calc(1.325rem_+_0.9vw)] !tracking-[normal] !leading-none !mb-2">5000+</h3>
                                                <p class="!mb-0 text-[0.8rem] font-medium">Satisfied Customers</p>
                                            </div>
                                            <!--/.card-body -->
                                        </div>
                                        <!--/.card -->
                                    </div>
                                    <!--/column -->
                                </div>
                                <!--/.row -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!--/column -->
                    <div class="xl:w-5/12 lg:w-5/12 w-full flex-[0_0_auto] xl:!px-[35px] lg:!px-[20px] !px-[15px] !mt-[50px] max-w-full">
                        <h2 class="!text-[calc(1.305rem_+_0.66vw)] font-bold xl:!text-[1.8rem] !leading-[1.3] !mb-3">Let’s Talk</h2>
                        <p class="lead !text-[1.05rem] !leading-[1.6] font-medium">Let's make something great together. We are <span class="relative z-[2] whitespace-nowrap after:content-[''] after:block after:absolute after:w-[102.5%] after:h-[30%] after:left-[-1.5%] after:z-[-1] after:transition-all after:duration-[0.2s] after:ease-in-out after:!mt-0 after:rounded-[5rem] after:bottom-[9%] motion-reduce:after:transition-none after:bg-[rgba(63,120,224,.12)]">trusted by</span> over 5000+ clients. Join them by using our services and grow your business.</p>
                        <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <a href="#" class="btn btn-primary !text-white !bg-[#3f78e0] border-[#3f78e0] hover:text-white hover:bg-[#3f78e0] hover:!border-[#3f78e0]   active:text-white active:bg-[#3f78e0] active:border-[#3f78e0] disabled:text-white disabled:bg-[#3f78e0] disabled:border-[#3f78e0] !rounded-[50rem] !mt-2 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">Join Us</a>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->
    </div>
    <!-- /.content-wrapper -->
@endsection
