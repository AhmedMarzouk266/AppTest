


    <h1><?=$title?></h1><br/><br/>



<div class="container">
    <form action="/admin" method="post" > <!-- onSubmit="createObject(); return false" -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Username : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="userName" id="userName" placeholder="Username">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password :</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="userPassword" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://webtracking-v01.bpmonline.com/JS/track-cookies.js"></script>
<script src="https://webtracking-v01.bpmonline.com/JS/create-object.js"></script>
<script>
/**
* Replace the "css-selector" placeholders in the code below with the element selectors on your landing page.
* You can use #id or any other CSS selector that will define the input field explicitly.
* Example: "Email": "#MyEmailField".
* If you don't have a field from the list below placed on your landing, leave the placeholder or remove the line.
*/
var config = {
    fields: {
        "Name": "#userName" // Name of a visitor, submitting the page
    },
    landingId: "a4e146c2-7fd2-406f-be27-76ec707d1c72",
    serviceUrl: "https://005419-marketing.bpmonline.com/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
    redirectUrl: "profi.artorg.com.ua/admin"
};
/**
* The function below creates a object from the submitted data.
* Bind this function call to the "onSubmit" event of the form or any other elements events.
* Example: <form class="mainForm" name="landingForm" onSubmit="createObject(); return false">
*/
function createObject() {
    landing.createObjectFromLanding(config)
}
/**
* The function below inits landing page using URL parameters.
*/
function initLanding() {
    landing.initLanding(config)
}
jQuery(document).ready(initLanding)
</script>