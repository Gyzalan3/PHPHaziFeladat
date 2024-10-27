<?php

include 'Student.php';
include 'Subject.php';
include 'University.php';


function sortStudentsByAverageGrade(array $students): array
{
    usort($students, function ($a, $b) {
        return $b->getAvgGrade() <=> $a->getAvgGrade();
    });
    return $students;
}

try {

    $university = new University();

    $subject1 = $university->addSubject("1", "Matematika");
    $subject2 = $university->addSubject("2", "Informatika");

    $student1 = new Student("Kiss Zsolt", "S1");
    $student2 = new Student("Nagy Soma", "S2");

    $university->addStudentOnSubject("1", $student1);
    $university->addStudentOnSubject("2", $student2);

    $student1->addGrade($subject1, 8.5);
    $student2->addGrade($subject2, 9.0);

    echo $student1->getName() . " átlagjegye: " . $student1->getAvgGrade() . "<br>";
    echo $student2->getName() . " átlagjegye: " . $student2->getAvgGrade() . "<br>";
    echo "Jegyek:<br>";

    $student1->printGrades();

    $student2->printGrades();
    

    echo "Egyetem kurzusai és hallgatói:<br>";
    $university->print();
    echo " <br>";
//-------------------------------------
    $students = [$student1, $student2];
    $sortedStudents = sortStudentsByAverageGrade($students);

    echo "A hallgatók jegy átlag szerint:<br>";
    foreach ($sortedStudents as $student) {
        echo $student->getName() . " - Átlagjegy: " . $student->getAvgGrade() . "<br>";
    }

} catch (Exception $e) {
    echo "Hiba: " . $e->getMessage() . "<br>";
}