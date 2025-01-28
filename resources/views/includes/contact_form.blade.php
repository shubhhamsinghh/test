<section class="contact-us-area pb-60">
                <div class="container">
                    <div class="blog-reply-wrapper mt-50">
                        <h4 class="blog-dec-title">POST A COMMENT</h4>
                        <form action="{{route('contact_add')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="leave-form">
                                        <input type="text" placeholder="Full Name*" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="leave-form">
                                        <input type="email" placeholder="Eail Address*" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="leave-form">
                                        <input type="text" placeholder="Phone No*" name="phone" required onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-leave">
                                        <input type="submit" value="SEND MASSAGE">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </section>