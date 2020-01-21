<?php
class FakerController extends CI_Controller
{
    private $faker;
    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_hibahbansos');
    }
    public function index(){
        $this->generateUser();
        $this->generateOperator();
    }
    public function randomHibansos(){
        $users = $this->M_user->readUser();
        foreach ($users as $user){
            for ($i = 0; $i<5;$i++){
                $data = [];
                $data["idYangMengajukan"] = $user["id"];
                $data["tglPengajuan"] = \Carbon\Carbon::now()->toDateTimeString();
                $data["tglKegiatan"] = \Carbon\Carbon::now()->add(random_int(30, 90), "day")->toDateString();
                $data["nama"] = $user["nama"];
                $data["alamat"] = $user["alamat"];
                $data["judulKegiatan"] = str_replace(".","",$this->faker->sentence(4));
                $data["latarBelakang"] = $this->faker->paragraph(10);
                $data["maksudTujuan"] = $this->faker->paragraph(10);
                $data["dana"] = random_int(1, 10) * 1000000;
                $data["deskripsiDana"] = $this->faker->paragraph(5);
                $image = new \Intervention\Image\ImageManager();
                $path = "assets/proposal/foto/".$data["judulKegiatan"].".jpg";
                $image->make($this->faker->imageUrl())->save($path);
                $data["foto"] = $path;
                $pdf = file_get_contents(base_url("assets/simple.pdf"));
                $path = "assets/proposal/".$data["judulKegiatan"].".pdf";
                if (file_put_contents($path, $pdf)){
                    $data["fileProposal"] = $path;
                }
                if ($this->M_hibahbansos->createHibahBansos($data)){
                    echo "Proposal ".$data["judulKegiatan"]." by ".$user["nama"]." created <br>";
                }
            }
        }
    }
    private function generateUser(){
        $user = new _User();
        $data=$user->generate();
        foreach ($data as $userdata)
            $this->M_user->createUser($userdata);
        echo " ".count($data)." user created <br>";
    }
    private function generateOperator(){
        $user = new Operator();
        $data=$user->generate();
        foreach ($data as $userdata)
        {
            if ( $this->M_user->createUser($userdata) === 1){
                echo "operator created <br>";
            }
        }
    }
}
abstract class User {
    private $faker;
    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }
    protected function generateCommonData(){
        $name = $this->faker->name;
        $email = $this->faker->email;
        $address = $this->faker->address;
        $phone = new Faker\Provider\id_ID\PhoneNumber($this->faker);
        $phone = str_replace("(+62) ","", $phone->phoneNumber());
        $ktp = ($this->faker->unique()->creditCardNumber);
        $username = $this->faker->unique()->userName;
        $password = "1q2w3e4r";
        return [
            "nama"=>$name,"email"=>$email, "alamat"=>trim($address), "telepon"=>$phone, "noKtp"=>$ktp, "username"=>$username,
            "passReal"=>$password,
            "passHash"=>md5($password)
        ];
    }
    abstract function generate();
}
class Operator extends User{
    public function generate()
    {
        $operator = [];
        foreach (["Admin"=>1,"Tu"=>2,"Setda"=>3,"Skpd"=>4,"Tapd"=>5,"Bupati"=>6,"Auditor"=>8] as $op =>$role_id){
            $data = $this->generateCommonData();
            $data["username"] = "op_".$op;
            $data["role_id"] = $role_id;
            $data["statusAktif"] = 1;
            array_push($operator, $data);
        }
        return $operator;
    }
}
class _User extends User{
    public function generate()
    {
        $users = [];
        for ($i =0 ; $i<10;$i++){
            $users[$i] = $this->generateCommonData();
            $users[$i]["role_id"] = 7;
        }
        return $users;
    }
}