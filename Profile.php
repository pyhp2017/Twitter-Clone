<?php
namespace twitter;
require_once 'User.php';
require_once 'ProfileHeader.php';
?>


<?php
    $user1 = new User("ahmad","pass","ahmad@gmail.com",getdate(),"Res/avatar.png");
?>


<img src=<?php echo $user1->getImage() ?> alt="Avatar" width="100" height="100">
<h4>User: <?php echo $user1->getUserName(); ?> </h4>
<h4>Email: <?php echo $user1->getEmail(); ?> </h4>
<h4>Last Tweet: <?php print_r($user1->getLastTweetDate()); ?> </h4>

<?php require_once 'ProfileFooter.php'; ?>