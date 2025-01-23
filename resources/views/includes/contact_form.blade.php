<form class="" role="form" method="post" autocomplete="off" action="{{ url('contact_add') }}"
    enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="phone" placeholder="Your Phone"
            onkeypress="javascript:return isNumberKey(event)" maxlength="10" required placeholder="Phone" required>
    </div>
    <div class="form-group">
        <textarea name="message" cols="30" rows="4" class="form-control" placeholder="Write Your Message"></textarea>
    </div>
    <button type="submit" class="theme-btn">Send
        Message <i class="far fa-paper-plane"></i></button>
    <div class="col-md-12 my-3">
        <div class="form-messege text-success"></div>
    </div>
</form>
