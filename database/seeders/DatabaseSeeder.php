<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Center;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Test;
use App\Models\TestMark;
use App\Models\TuitionClass;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'qwe',
            'email' => 'qwe@qwe.com',
            'password' => 'qwe',
        ]);

        $center1 = Center::factory()->create([
            'name' => 'Oxygen',
            'address' => 'Oxygen Address',
        ]);
        $center2 = Center::factory()->create([
            'name' => 'Nitrogen',
            'address' => 'Nitrogen Address',
        ]);

        $class1 = TuitionClass::factory()->create([
            'grade' => '11',
            'year' => '2021',
            'center_id' => $center1->id,
        ]);
        $class2 = TuitionClass::factory()->create([
            'grade' => '10',
            'year' => '2021',
            'center_id' => $center2->id,
        ]);

        $student1 = Student::factory()->create([
            'student_index' => '1',
            'name' => 'Student 1',
            'grade' => '11',
            'address' => 'address 1'
        ]);
        $student2 = Student::factory()->create([
            'student_index' => '2',
            'name' => 'Student 2',
            'grade' => '10',
            'address' => 'address 2'
        ]);
        $student3 = Student::factory()->create([
            'student_index' => '3',
            'name' => 'Student 3',
            'grade' => '11',
            'address' => 'address 3'
        ]);
        $student4 = Student::factory()->create([
            'student_index' => '4',
            'name' => 'Student 4',
            'grade' => '10',
            'address' => 'address 4'
        ]);

        $registration1 = Registration::factory()->create([
            'student_id' => $student1->id,
            'tuition_class_id' => $class1->id,
        ]);
        $registration2 = Registration::factory()->create([
            'student_id' => $student2->id,
            'tuition_class_id' => $class2->id,
        ]);
        $registration3 = Registration::factory()->create([
            'student_id' => $student3->id,
            'tuition_class_id' => $class1->id,
        ]);
        $registration4 = Registration::factory()->create([
            'student_id' => $student4->id,
            'tuition_class_id' => $class2->id,
        ]);

        $payment1 = Payment::factory()->create([
            'registration_id' => $registration1->id,
            'amount' => 1000,
            'month' => '01',
            'date' => '2021-04-20',
            'type' => 'Online',
        ]);
        $payment2 = Payment::factory()->create([
            'registration_id' => $registration2->id,
            'amount' => 2000,
            'month' => '02',
            'date' => '2021-04-20',
            'type' => 'Physical',
        ]);
        $payment3 = Payment::factory()->create([
            'registration_id' => $registration3->id,
            'amount' => 3000,
            'month' => '03',
            'date' => '2021-04-20',
            'type' => 'Online',
        ]);
        $payment4 = Payment::factory()->create([
            'registration_id' => $registration4->id,
            'amount' => 4000,
            'month' => '04',
            'date' => '2021-04-20',
            'type' => 'Physical',
        ]);

        $test1 = Test::factory()->create([
            'tuition_class_id' => $class1->id,
            'name' => 'Test 1',
            'date' => '2021-04-20',
            'type' => 'Theory',
        ]);
        $test2 = Test::factory()->create([
            'tuition_class_id' => $class2->id,
            'name' => 'Test 2',
            'date' => '2021-04-20',
            'type' => 'Theory',
        ]);
        $test3 = Test::factory()->create([
            'tuition_class_id' => $class1->id,
            'name' => 'Test 3',
            'date' => '2021-04-20',
            'type' => 'Theory',
        ]);
        $test4 = Test::factory()->create([
            'tuition_class_id' => $class2->id,
            'name' => 'Test 4',
            'date' => '2021-04-20',
            'type' => 'Theory',
        ]);

        $testMark1 = TestMark::factory()->create([
            'registration_id' => $registration1->id,
            'test_id' => $test1->id,
            'mark' => 50,
        ]);
        $testMark2 = TestMark::factory()->create([
            'registration_id' => $registration2->id,
            'test_id' => $test2->id,
            'mark' => 60,
        ]);
        $testMark3 = TestMark::factory()->create([
            'registration_id' => $registration3->id,
            'test_id' => $test3->id,
            'mark' => 70,
        ]);
        $testMark4 = TestMark::factory()->create([
            'registration_id' => $registration4->id,
            'test_id' => $test4->id,
            'mark' => 80,
        ]);

        $attendance1 = Attendance::factory()->create([
            'registration_id' => $registration1->id,
            'date' => '2021-04-20',
            'present' => true,
        ]);
        $attendance2 = Attendance::factory()->create([
            'registration_id' => $registration2->id,
            'date' => '2021-04-20',
            'present' => true,
        ]);
        $attendance3 = Attendance::factory()->create([
            'registration_id' => $registration3->id,
            'date' => '2021-04-20',
            'present' => false,
        ]);
        $attendance4 = Attendance::factory()->create([
            'registration_id' => $registration4->id,
            'date' => '2021-04-20',
            'present' => true,
        ]);
    }
}
