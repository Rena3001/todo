<?php
include_once './connect.php';


$addTodo=$conn->prepare("SELECT * FROM users");
$addTodo->execute();
$todos=$addTodo->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  href="./css/style.css">
</head>
<body>
    <form method="post" action="./server.php" class="todo-list">
        <h1>To-Do List</h1>
        <div class="add">
        <input type="text" name="title" id="task" placeholder="Add a task...">

        <button id="add-button"><a href="./server.php">Add</a></button>
        </div>
        <?php 
        if(isset($_COOKIE['status'])){
            if($_COOKIE['status']=='empty'){
                ?>
                 <div class="error">Please fill all inputs</div>
                <?php      
            }else if($_COOKIE['status']=='success'){
                ?>
                 <div class="success">successfull adding</div>

                <?php
            }
        }
        ?>
        <div class="task-list">
            <?php
            foreach($todos as $todo){
                ?>
            <div class="todo">
                <span><?= $todo['title'] ?></span>
                <span>Delete</span>
             </div>
                <?php
            }
            ?>
          
           
        </div>
</form>

    <script src="script.js"></script>
</body>
</html>
