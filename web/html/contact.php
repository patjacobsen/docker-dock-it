<?php
session_start();
$pageTitle = 'Contact Us';
include "includes/header.php";
?>

<div class="container">

    <div
    <fieldset>
        <legend><h2>Contact Us</h2></legend>
        <form id="myform" name="My Form" method="post" action="thanks.php">

            <p>
                <label for="name">Name*</label>
                <input type="text" name="name" id="name" placeholder="John Smith" required>
            </p>

            <p>
                <label for="subject">Subject*</label>
                <input type="text" name="subject" id="subject" placeholder="Inquiry" required>
            </p>

            <p>
                <label for="email">Email*</label>
                <input type="email" name="email" id="email" placeholder="123@gmail.com" required>
            </p>

            <p>
                <label for="comments">Comments*</label>
                <textarea name="comments" cols="50" rows="5" id="comments" required></textarea>
            </p>

            <p>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
            </p>

        </form>
    </fieldset>
</div>
<?php
if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $visitor_email = $_POST['email'];
    $message = $_POST['comments'];

    $email_from = $visitor_email;
    $email_subject = $subject;
    $email_body = "\n $message";
    $headers = "From: $email_from \r\n";
    mail('patjacob113@gmail.com', $email_subject, $email_body, $headers);
}
?>
</div>

<?php
include "includes/footer.php";
?>
