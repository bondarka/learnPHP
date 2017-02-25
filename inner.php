<!DOCTYPE html>
<html>
<head>
    <title>Task number 3</title>
</head>
<body>
<?php
//1)На входе строка из от 1 до n символов.Нужно возвращать средний символ строки если количество символов нечетноеИли возвращать 2 средних символа если количество символов четное
echo "<h2 style='text-align: center'>"."1)На входе строка из от 1 до n символов.Нужно возвращать средний символ строки если количество символов нечетное Или возвращать 2 средних символа если количество символов четное"."</h2>";
if(isset($_POST['name'])){
    $string = $_POST['name'];
    $arrayString =str_split($string);
    $arrayStringLength = count($arrayString);
    $n = $arrayStringLength/2;
    if($arrayStringLength%2 == 0){
        $result = array_slice ($arrayString,$n-1,2);
        $newResult = implode(",",$result);
    }else{
        $result = array_slice($arrayString,floor($n),1);
        $newResult = implode(",",$result);
    }
    print $newResult;
}
?>
<form method="post" action="index.php">
    <input name="name" type="text" placeholder="write something"></p>
    <input type="submit" value="Send">
</form>
</body>
</html>
