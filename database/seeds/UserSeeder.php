<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
            factory(User::class)->create([
                'rut' => $this->generar_rut()
            ]);
        }
    }

    public function generar_rut_sin_dv(){
        return rand(1111111, 29999999);
    }

    public function generar_dv($r){
        $s=1;
        for($m=0;$r!=0;$r/=10)
            $s=($s+$r%10*(9-$m++%6))%11;
        return chr($s?$s+47:75);
   }

    public function generar_rut(){
        $rut_sin_dv = $this->generar_rut_sin_dv();
        $dv = $this->generar_dv($rut_sin_dv);
        return $rut = $rut_sin_dv. '-'.$dv; 
    }
}
