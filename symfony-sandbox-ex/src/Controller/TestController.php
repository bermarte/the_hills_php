<?php

namespace App\Controller;


use App\Entity\Student;
use App\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        /*
        $teacher = new Teacher();
        $teacher->setEmail('teacher@mail.be');
        $teacher->setName('teacher God');

        $student = new Student();
        $student->setName("Batman");
        $student->setAge(25);
        $student->setEmail("batman@hotmail.com");

        $teacher->addStudent($student);
        */
        $teacher = new Teacher();
        $teacher->setEmail('teacher@becode.org');
        $teacher->setName('Teacher God');

        $teacher->addStudent(new Student('Batman','batman@mail.be', 25));
        $teacher->addStudent(new Student('Superwoman','superwoman@mail.be', 32));

        $this->getDoctrine()->getManager()->persist($teacher);
        //$this->getDoctrine()->getManager()->persist($student);
        $this->getDoctrine()->getManager()->flush();

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'name' => $teacher->getName()

        ]);
    }
    /**
     * @Route("/view/student/{student}", name="view_student")
     */

    public function ViewStudent(Student $student){
        //die(student::class);
        //Student::class would be the name space
        /*
        $student = $this->getDoctrine()->getRepository(Student::class)
            ->find(1);
        */
        //FindBy or FindObeBy
        /*
        $student = $this->getDoctrine()->getRepository(Student::class)
            ->findOneBy(['email' => 'bermarte@hotmail.com']);
        */
        /*
        return $this->render('test/view.html.twig', [
            'student'=> $student,
        ]);
        */
        $student = $this->getDoctrine()->getRepository(Student::class)
            ->findOneBy(['email' => 'bermarte@hotmail.com']);

        return $this->render('test/view.html.twig', [
            'student'=> $student,
        ]);

    }
    /**
     * @Route("/view/teacher/{teacher}", name="view_teacher")
     */
    public function ViewSTeacher(Teacher $teacher){
        /*
        $student = $this->getDoctrine()->getRepository(Teacher::class)
            ->findOneBy(['email' => 'bermarte@hotmail.com']);
        */

        return $this->render('test/teacher.html.twig', [
            'teacher'=> $teacher,
        ]);

    }
    /*
     coom
    public function ViewStudent(){
        //die(student::class);
        //Student::class would be the name space

    //FindBy or FindObeBy
$student = $this->getDoctrine()->getRepository(Student::class)
->findOneBy(['email' => 'bermarte@hotmail.com']);

return $this->render('test/view.html.twig', [
'student'=> $student,
]);

}
*/
}
