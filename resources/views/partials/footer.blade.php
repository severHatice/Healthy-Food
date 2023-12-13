    <div class="footer-section">
    <div class="container">
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">    
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="#about">about</a></li>
                            <li><a href="#">Recipes</a></li>
                            <li><a href="#contact">Calory Tracker</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Subscribe</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="/footer"  method="POST">
                                @csrf
                                <input type="email" placeholder="Email Address" name="email" required>
                                <button type="submit" ><i class="fab fa-telegram-plane"></i></button>
                            </form>
                            <div class="confirmation-message" style="display: none;">Merci de vous être abonné !</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2023, All Right Reserved</p>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>