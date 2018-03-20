
    <fieldset title="Step1" class="step" id="default-step-0">
     <legend> </legend>
       <div class="form-group">
      <label class="col-lg-3 control-label">Post Title</label>
      <div class="col-lg-9">
         <input type="text" id="name" name="title" class="form-control " v-model="form.post_title" placeholder="Post Title" required>
      </div>
   </div>
   <div class="form-group">
     <label class="col-lg-3 control-label">Notification Title</label>
      <div class="col-lg-9">
        <input type="text" name="notification_title" class="required  form-control" v-model="form.notification_title" placeholder="Notification Title">
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-3  for="" control-label">Notification Image</label>
      <div class="col-lg-9">
         <input type="url" name="notification_image" class="form-control" id="notification_image"  v-model="form.notification_image" placeholder="Notification Image url">
      </div>
   </div>
   <div class="form-group">
      <label class="col-lg-3  for="" control-label">Content Image</label>
      <div class="col-lg-9">
         <input type="url" name="content_image" class="form-control" id="content_image"  v-model="form.content_image" placeholder="Content Image url">
      </div>
   </div>
   <div class="form-group">
      <label class="col-lg-3 control-label">Catagory</label>
      <div class="col-lg-9">
         <input type="text" name="catagory" class="required form-control"  v-model="form.catagory" placeholder="Catagory">
      </div>
   </div>
    </fieldset>
 <fieldset title="Step2" class="step" id="default-step-1">
     <legend> </legend>
      <div class="form-group">
      <label class="col-lg-3 control-label">Content in html</label>
      <div class="col-lg-9">
         <textarea class="form-control" required name="html_content" v-model="form.html_content" cols="60" rows="5"></textarea>
      </div>
   </div> 
 <div class="form-group">
      <label class="col-lg-3 control-label">Notification Content</label>
      <div class="col-lg-9"> 
        <textarea class="form-control" name="notification_content" v-model="form.notification_content" cols="60" rows="5"></textarea>
  </div>
   </div> 
   <div class="form-group">
      <label class="col-lg-3 control-label">Schedule Date :</label>
      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd"  class="input-append date dpYears col-lg-9 form-group">
         <input type="date" class="form-control whiteonly" readonly v-model="form.schedule_date"  size="16">
         <span class="input-group-btn add-on">
         <button class="btn btn-info btn-xs" type="button"><i class="fa fa-calendar"></i></button>
         </span>
      </div>
   </div>
     
    </fieldset>
 <fieldset title="Step3" class="step" id="default-step-2">
     <legend> </legend>   
       <div class="form-group">
      <label class="col-lg-3 control-label">Post Title</label>
      <div class="col-lg-9">
         <p class="form-control-static">@{{form.post_title}}</p>
      </div>
   </div>
   <div class="form-group">
      <label class="col-lg-3 control-label">Notification Title</label>
      <div class="col-lg-9">
         <p class="form-control-static">@{{form.notification_title}}</p>
      </div>
   </div>
   <div class="form-group">
      <label class="col-lg-3 control-label">catagory</label>
      <div class="col-lg-9">
         <p class="form-control-static">@{{form.catagory}}</p>
      </div>
   </div>
   <div class="form-group">
      <label class="col-lg-3 control-label">Content in HTML</label>
      <div class="col-lg-9">
         <p class="form-control-static">@{{form.html_content}}</p>
      </div>
   </div>
   <div class="form-group">
      <label class="col-lg-3 control-label">Notification Content</label>
      <div class="col-lg-9">
         <p class="form-control-static">
            @{{form.notification_content}}
         </p>
      </div>
   </div>
   <div class="form-group">
      <label class="col-lg-3 control-label">Schedule Date</label>
      <div class="col-lg-9">
         <p class="form-control-static">
            @{{form.schedule_date}}
         </p>
      </div>
   </div>
    </fieldset>
