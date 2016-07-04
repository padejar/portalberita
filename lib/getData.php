<?php
if(isset($_POST['page'])){
    //Include pagination class file
    include('Pagination.php');

    //Include database configuration file
    include('../config/koneksi.php');

    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 3;

    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as postNum FROM posts");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['postNum'];

    //initialize pagination class
    $pagConfig = array('baseURL'=>'lib/getData.php', 'totalRows'=>$rowCount, 'currentPage'=>$start, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);

    //get rows
    $query = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT $start,$limit");

    if($query->num_rows > 0){ ?>
        <div class="posts_list">
        <?php
            while($row = $query->fetch_assoc()){
                $postID = $row['id'];
        ?>
            <div class="list_item"><a href="javascript:void(0);"><h2><?php echo $row["title"]; ?></h2></a></div>
        <?php } ?>
        </div>
        <?php echo $pagination->createLinks(); ?>
<?php }
}
?>