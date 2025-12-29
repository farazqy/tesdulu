<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Building;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Report;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@telkomuniversity.ac.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $mhs1 = User::create([
            'name' => 'M. Arif',
            'email' => 'muhammadarifk@student.telkomuniversity.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);

        $mhs2 = User::create([
            'name' => 'Merry',
            'email' => 'merry@student.telkomuniversity.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);

        $mhs3 = User::create([
            'name' => 'Reza',
            'email' => 'reza@student.telkomuniversity.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);

        $mhs4 = User::create([
            'name' => 'Diiwa',
            'email' => 'nadhira@student.telkomuniversity.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);

        $KJC = Building::create(['name' => 'Kampus Minangkabau', 'code' => 'KJC']);
        $KJB = Building::create(['name' => 'Kampus Setiabudi', 'code' => 'KJB']);
        $KJA = Building::create(['name' => 'Kampus Daan Mogot', 'code' => 'KJA']);

        $room1 = Room::create([
            'building_id' => $KJC->id,
            'name' => '03-003',
            'capacity' => 40,
            'is_available' => true
        ]);
        
        $room2 = Room::create([
            'building_id' => $KJC->id,
            'name' => '03-001',
            'capacity' => 40,
            'is_available' => true
        ]);

        $room3 = Room::create([
            'building_id' => $KJC->id,
            'name' => '03-004',
            'capacity' => 60,
            'is_available' => true
        ]);

        $room4 = Room::create([
            'building_id' => $KJA->id,
            'name' => '04-004',
            'capacity' => 60,
            'is_available' => true
        ]);

        $room5 = Room::create([
            'building_id' => $KJA->id,
            'name' => '04-003',
            'capacity' => 50,
            'is_available' => true
        ]);

        $room6 = Room::create([
            'building_id' => $KJB->id,
            'name' => '03-002',
            'capacity' => 50,
            'is_available' => true
        ]);

        Booking::create([
            'user_id' => $mhs1->id,
            'room_id' => $room1->id,
            'start_time' => Carbon::today()->setHour(7)->setMinute(30), 
            'end_time' => Carbon::today()->setHour(10)->setMinute(30),
            'purpose' => 'Pergantian Jadwal Matakuliah',
            'status' => 'approved'
        ]);

        Booking::create([
            'user_id' => $mhs1->id,
            'room_id' => $room2->id,
            'start_time' => Carbon::today()->setHour(9)->setMinute(30), 
            'end_time' => Carbon::today()->setHour(11)->setMinute(30),
            'purpose' => 'Mentoring Agama Islam',
            'status' => 'approved'
        ]);

        Booking::create([
            'user_id' => $admin->id,
            'room_id' => $room2->id,
            'start_time' => Carbon::today()->setHour(12)->setMinute(30), 
            'end_time' => Carbon::today()->setHour(15)->setMinute(30),
            'purpose' => 'Kelas',
            'status' => 'approved'
        ]);

        Booking::create([
            'user_id' => $admin->id,
            'room_id' => $room5->id,
            'start_time' => Carbon::today()->setHour(15)->setMinute(30), 
            'end_time' => Carbon::today()->setHour(18)->setMinute(30),
            'purpose' => 'Kelas',
            'status' => 'approved'
        ]);

        Booking::create([
            'user_id' => $admin->id,
            'room_id' => $room4->id,
            'start_time' => Carbon::today()->setHour(6)->setMinute(30), 
            'end_time' => Carbon::today()->setHour(9)->setMinute(30),
            'purpose' => 'Kelas',
            'status' => 'approved'
        ]);

        Booking::create([
            'user_id' => $admin->id,
            'room_id' => $room6->id,
            'start_time' => Carbon::today()->setHour(9)->setMinute(30), 
            'end_time' => Carbon::today()->setHour(12)->setMinute(30),
            'purpose' => 'Kelas',
            'status' => 'approved'
        ]);

        Booking::create([
            'user_id' => $admin->id,
            'room_id' => $room3->id,
            'start_time' => Carbon::today()->setHour(15)->setMinute(30), 
            'end_time' => Carbon::today()->setHour(18)->setMinute(30),
            'purpose' => 'Kelas',
            'status' => 'approved'
        ]);

        Booking::create([
            'user_id' => $mhs2->id,
            'room_id' => $room3->id,
            'start_time' => Carbon::today()->setHour(5)->setMinute(30), 
            'end_time' => Carbon::today()->setHour(6)->setMinute(30),
            'purpose' => 'Seminar Proposal',
            'status' => 'pending'
        ]);

        Report::create([
            'user_id' => $mhs2->id,
            'room_id' => $room2->id,
            'title' => 'AC Tidak Dingin',
            'description' => 'AC di bagian belakang ruangan mengeluarkan suara bising dan tidak dingin.',
            'status' => 'pending'
        ]);

        Report::create([
            'user_id' => $admin->id,
            'room_id' => $room3->id,
            'title' => 'Kabel VGA Putus',
            'description' => 'Kabel VGA untuk proyektor putus digigit tikus.',
            'status' => 'processed'
        ]);
    }
}