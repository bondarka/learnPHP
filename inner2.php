<?php
//Enter your code here, enjoy!
echo "<!DOCTYPE html>";
echo "<html>";
echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';


$collection = array();

$collection[] = array('surname' => 'Иванов', 'name' =>'Иван ','patronymic' => 'Иванович', 'mathematic' =>5,'physics' =>5,'painting' =>5);
$collection[] = array('surname' => 'Петров', 'name' =>'Игнатий','patronymic' => 'Петрович', 'mathematic' =>4,'physics' =>4,'painting' =>5);
$collection[] = array('surname' => 'Сидоров', 'name' =>'Игорь','patronymic' => 'Сергеевич', 'mathematic' =>3,'physics' =>3,'painting' =>5);
$collection[] = array('surname' => 'Чехов', 'name' =>'Антон','patronymic' => 'Павлович', 'mathematic' =>3,'physics' =>4,'painting' =>5);
$collection[] = array('surname' => 'Бутко', 'name' =>'Александра','patronymic' => 'Сергеевна', 'mathematic' =>4,'physics' =>4,'painting' =>5);
$collection[] = array('surname' => 'Колесник', 'name' =>'Игорь','patronymic' => 'Сергеевич', 'mathematic' =>5,'physics' =>5,'painting' =>5);

/*1) Вывести все фамилии, количество букв в которых больше 5 */
echo "<h2>".'Фамилии, количество букв в которых больше 5'."</h2>";
echo "<ul class='list-surname'>";
foreach($collection as $largesurname) {
    if(mb_strlen($largesurname['surname'])>5){
        echo "<li>".$largesurname['surname']."</li>";
    }
}
echo  "</ul>";

/*2) Вывести фамилии отличников (ученики, у которых все оценки 5) */
echo "<h2>".'Фамилии отличников (ученики, у которых все оценки 5)'."</h2>";
echo "<ul class='list-stars'>";
foreach($collection as $stars) {
    if($stars['mathematic']==5 && $stars['physics']==5 && $stars['painting'] == 5){
        echo "<li>".$stars['surname']."</li>";
    }
}
echo  "</ul>";

/*3) Вывести фамилии отличников у которых средний балл меньше 4*/
echo "<h2>".'Фамилии отличников у которых средний балл меньше 4'."</h2>";
echo "<ul class='list-mark'>";
$sum = array('mathematic' =>0,'physics' =>0,'painting' =>0);

foreach($collection as $mark) {
    if(($mark['mathematic'] + $mark['physics']+$mark['painting'])/3 <4){
        echo "<li>".$mark['surname']."</li>";
    }
}
echo  "</ul>";


/*4)  Вывести всеx учеников, которые не имеют тезок в классе. */
echo "<h2>".'Все ученики, которые не имеют тезок в классе'."</h2>";
echo "<ul class='list'>";
foreach($collection as $item){
    $counter = 0;
    foreach ($collection as $inner){
        if ($inner['name'] === $item['name']){
            $counter = $counter + 1;
        }
    }
    if ($counter === 1){
        echo "<li>".$item['name']." ".$item['surname']. "</li>";
    }
}
echo  "</ul>";



/*5)Вывести все имена в классе без повторов. Например, если в классе 5 Сергеев, то вывести имя Сергей один раз. */
echo "<h2>".'Все имена в классе без повторов'."</h2>";
echo "<ul class='list'>";

$oneName = [];

for ($i=0; $i < count($collection); $i++) {
    $pupil = $collection[$i]["name"];
    array_push($oneName, $pupil);
    $studUnique = array_unique($oneName);
}
for ($j=0; $j < count($studUnique); $j++){
    echo "<li>". $studUnique[$j] . "</li>";
}
echo  "</ul>";




/*6)Вывести средний бал (показатель успеваемости в классе) по всем ученикам, по каждому предмету. */
echo "<h2>".'Показатель успеваемости в классе по всем ученикам, по каждому предмету'."</h2>";
echo "<table class='list-lessons'>";
echo "<tr class='header-table'>";
echo "<th>".'Средний бал по математике'."</th>";
echo "<th>".'Средний бал по физике'."</th>";
echo "<th>".'Средний бал по рисованию'."</th>";
foreach($collection as $item){
    foreach ($sum as $key=>$element){
        $sum[$key] += $item[$key];
    }
}
echo "<tr class='body-table'>";
foreach ($sum as $key=>$element){
    echo "<td>".round($sum[$key] = $element / count($collection))."</td>";
}
echo "</tr>";
echo "</table>"; 



/*7) Вывести количество фамилий в классе, начинающихся с гласной буквы */
echo "<h2>".'Количество фамилий в классе, начинающихся с гласной буквы'."</h2>";
echo "<ul class='list-surname'>";

$globalList = [];
$vowelList = [];
$number =0;
for ($i=0; $i < count($collection); $i++) {
    $person = $collection[$i]["surname"];
    array_push($globalList,  $person);
    $studentGlobal = array_unique($globalList);
}

for ($j=0; $j < count( $studentGlobal); $j++){
    $cool = mb_substr( $studentGlobal[$j], 0, 1);
    array_push($vowelList, $cool);
    $studVowel= array_unique( $vowelList);
}

for ($j=0; $j < count($studVowel); $j++){
    if($studVowel[$j] =='И' || $studVowel[$j] =='А' || $studVowel[$j] =='О' || $studVowel[$j] =='Е' || $studVowel[$j] =='Ё'
        || $studVowel[$j] =='Э' || $studVowel[$j] =='Ы' || $studVowel[$j] =='У' || $studVowel[$j] =='Ю'|| $studVowel[$j] =='и' || $studVowel[$j] =='а' || $studVowel[$j] =='о'
        ||$studVowel[$j] =='е' || $studVowel[$j] =='ё'
        || $studVowel[$j] =='э' || $studVowel[$j] =='ы' || $studVowel[$j] =='у' || $studVowel[$j] =='ю'){
        $number++;
        echo "<li>".$number."-".  $studentGlobal[$j] . "</li>";
    }

}
echo  "</ul>";

echo "</html>";
?>
