<div id="contact" class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Send us your messages</h2>
             </div>
          </div>
          <div class="col-md-6 offset-md-3">
             <form id="request" class="main_form" action="/contact" method="POST">
               @csrf 
               <div class="row">
                
                   <div class="col-md-12">
                      <textarea class="contactus" placeholder="Message" type="text"  name="message"> </textarea>
                   </div>
                   <div class="col-sm-12">
                      <button type="submit" class="send_btn">Send</button>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>