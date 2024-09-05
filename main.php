<?php
@include_once("./common.php");

$db_conn = mysql_conn();
$page = $_SERVER['REQUEST_URI'];

// Search Logic
$search_type = $_POST["search_type"];
$keyword = $_POST["keyword"];

if (empty($search_type) && empty($keyword)) {
    $query = "SELECT * FROM {$tb_name}";
} else {
    if ($search_type == "all") {
        $query = "SELECT * FROM {$tb_name} WHERE title LIKE '%{$keyword}%' OR writer LIKE '%{$keyword}%' OR content LIKE '%{$keyword}%'";
    } else {
        $query = "SELECT * FROM {$tb_name} WHERE {$search_type} LIKE '%{$keyword}%'";
    }
}

// Sort Logic
$sort = $_GET["sort"];
$sort_column = $_GET["sort_column"];

if (empty($sort_column) || empty($sort)) {
    $query .= " ORDER BY idx DESC";
} else {
    $query .= " ORDER BY {$sort_column} {$sort}";
}

$result = $db_conn->query($query);
$num = $result->num_rows;
?>

<br>
<br>
<div>
    <h1 style="text-align:center; font-size:50px">Simple Board</h1>
</div>
<br>
<br>
<br>

<form action="<?=$page?>" method="POST">
    <div class="input-group mb-3">
        <div class="col-auto my-1">
            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">search</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="search_type">
                <option value="all" selected>All</option>
                <option value="title">Title</option>
                <option value="writer">Writer</option>
                <option value="content">Content</option>
            </select>
        </div>
        <input type="text" class="form-control" placeholder="Keyword Input" name="keyword">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </div>
</form>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th width="10%" scope="col" class="text-center">
                <a href="index.php?sort_column=idx&sort=<?=($sort == 'asc') ? 'desc' : 'asc'?>" >No</a>
            </th>
            <th width="50%" scope="col" class="text-center">
                <a href="index.php?sort_column=title&sort=<?=($sort == 'asc') ? 'desc' : 'asc'?>" >Title</a>
            </th>
            <th width="20%" scope="col" class="text-center">
                <a href="index.php?sort_column=writer&sort=<?=($sort == 'asc') ? 'desc' : 'asc'?>" >Writer</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($num != 0) {
            for ($i = 0; $i < $num; $i++) {
                $row = $result->fetch_assoc();
        ?>
        <tr>
            <th scope="row" class="text-center"><?= $row["idx"] ?></th>
            <?php if ($row["secret"] == "y") { ?>
                <td><a href="index.php?page=auth&idx=<?= $row["idx"] ?>&mode=view"><?= $row["title"] ?></a></td>
            <?php } else { ?>
                <td><a href="index.php?page=view&idx=<?= $row["idx"] ?>"><?= $row["title"] ?></a></td>
            <?php } ?>
            <td class="text-center"><?= $row["writer"] ?></td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="4" class="text-center">Posts does not exist.</td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<div class="container">
    <?php if (!empty($_SESSION["id"])) { ?>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='index.php?page=write'">Write</button>
    </div>
    <?php } ?>
</div>

<?php $db_conn->close(); ?>
