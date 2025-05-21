<?php 
setcookie("lagrandee","webii",time()+86400);
setcookie ("rejina","pokharel",time()+ 2000);
setcookie("sampada","ghale",time()+86400);
setcookie ("football","messi",time()+ 5000);
setcookie ("kathmandu","balen",time()+ 1000);

//print_r($_cookie);

if(isset($_cookie["lagrandee"])){
    echo "cookie is",$_cookie["lagrandee"];
}
else{
    echo "cookie is not set";
    


}
?>
