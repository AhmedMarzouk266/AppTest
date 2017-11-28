
<br/>
<br/>
<div style="text-align: center">
    <h1> Welcome to AppTest</h1>
    <h3> Good Luck..</h3>
</div>
<br/>

<h2>FeedBack Form</h2><hr/>
<?php if($_GET['submit']!='true'){ ?>
<form method="post" onSubmit="createObject(); return false">
    <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label>Name </label>
        <input type="text" class="form-control" id="name"  placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label>Telephone</label>
        <input type="tel" class="form-control" id="tel" placeholder="Enter Phone number">
    </div>
    <div class="form-group">
        <label>Feedback</label>
        <input type="text" class="form-control" id="feedback" placeholder="feedback">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php }else{echo "<h2>Thanks !</h2>";} ?>


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
            "Name": "#name", // Name of a visitor, submitting the page
            "Email": "#email", // Visitor's email
            "MobilePhone": "#tel", // Visitor's phone number
            "Commentary": "#feedback" // Notes
        },
        landingId: "4d1a4d23-9701-4fb5-b1ec-432464cc9779",
        serviceUrl: "https://005419-marketing.bpmonline.com/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
        redirectUrl: "http://profi.artorg.com.ua/main/index?submit=true"
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
