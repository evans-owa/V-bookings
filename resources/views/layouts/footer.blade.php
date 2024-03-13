    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <div class="foo aboutus">
                <h2>About Us</h2>
                <p>
                    the best ticket seller
                </p>
                <ul class="social">
                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="#"><i class="bi bi-snapchat"></i></a></li>
                    <li><a href="#"></a><i class="bi bi-twitter-x"></i></li>
                    <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                </ul>
            </div>
            <div class="foo quicklinks">
                <h2>Quick Links </h2>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">movies</a></li>
                    <li><a href="#">Concerts</a></li>
                    <li><a href="#">Terms & Condition</a></li>
                </ul>
            </div>
            <div class="foo contacts">
                <h2>Contact Us</h2>
                <ul class="contact">
                    <li>
                        <span><i class="bi bi-geo"></i></span>
                        <span>3 Garrisa Road <br> Thika Kiambu Phase 13, Kiambu <br> KE </span>
                    </li>
                    <li>
                        <span class="pr-2"><i class="bi bi-phone"></i></span>
                        <P><a href="tel:+25474078005">+254778005 </a> </P>
                    </li>
                    <li>
                        <span class="text-primary pr-2"> <i class="bi bi-inbox"></i></span>
                        <P><a href="mailto:vansejizzy20@gmail.com">vansejizzy20@gmail.com</a> <br> </P>

                    </li>
                </ul>
            </div>
            <div class="foo admin">
                <h2>Staff admin</h2>
                @if (Route::has('login'))
                    @auth
                        <li class="item btn-btn-infor "><a href="{{ route('admin.login') }}">Staff login</a></li>
                    @endauth
                @endif
            </div>
        </div>
    </footer>
    <div class="copyrightText">
        <p>Copy Right © 2024 Evans . All Rights Reserved</p>
    </div>
    <script src="{{ asset('/bootstrap-custom/js/bootstrap.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("Good job!", "{{ session('status') }}", "success");
        </script>
    @endif

    </footer>
