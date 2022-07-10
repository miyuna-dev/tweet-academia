<?php
    include_once('../../app/classes/user_model.php');
    include_once('../../database/db.php');
    
    $connec = New Database();

    if (isset($_POST['user']))
    {
        $username = "@".trim($_POST['user'])."%";
        $req = $DB->query("SELECT * FROM members WHERE username LIKE'".$username."' LIMIT 10" );
        $req = $req->fetch_all(MYSQLI_ASSOC);
        
        foreach($req as $r)
        {
?>
            <div class="suggestion"><a href="../../public/singup/profileusers.php?user=<?= $r['id'] ?>"><?= $r['username']?></a></div>
            <!-- Dans le <a> modifier par $r['id'] si le lien ne marche plus -->
<?php
        }
    }
?>