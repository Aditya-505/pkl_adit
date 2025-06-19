<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
   
    
        private $arr = [

            ['id'=>1,'nama'=>'faza','kelas'=>'xii rpl 1'],
            ['id'=>2,'nama'=>'uned','kelas'=>'xii rpl 2'],
            ['id'=>3,'nama'=>'cemen','kelas'=>'xii rpl 3'],
        ];

        public function index ()
    {    
        $siswa = session('siswa.index', $this->arr);
        return view('siswa.index', ['siswa'=>$siswa]);
    }

    public function show($id){
        $siswa = collect($this->arr)->firstWhere('id',$id);
        
        //
        if (! $siswa) {
            abort(404);
        }

        //
        return view('siswa.show',['siswa' => $siswa]);
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request) 
    {
        $siswa = session('siswa_data',$this->arr);

        //
        $newId = collect($siswa)->max('id') + 1;

        //
        $siswa[] = [
            'id'=>$newId,
            'kelas'=>$request->kelas,
            'nama'=>$request->nama,
        ];

        //
        session(['siswa_data'=>$siswa]);

        //
        return redirect('/siswa');
    }

        public function edit($id){
            $siswa = collect($this->arr)->firstWhere('id', $id);
            $data = session('siswa_data', $this->arr);
            
            //
            if (! $siswa) {
                abort(404);
            }
    
            //
            return view('siswa.edit',   compact('siswa'));
        }

        public function update(Request $request,$id) {
            $data = session('siswa_data', $this->arr);

            //

            //
           foreach ($data as &$item){
            if ($item['id'] == $id) {
                //
                $item['id'] = $request->id;
                $item['nama'] = $request->nama;
                $item['kelas'] = $request->kelas;
                break;

            }
           }


            session(['siswa_data'=> $data]);
            return redirect('siswa');

        }

        public function destroy($id)
        {
            $siswa = session('siswa_data', $this->arr);
            $index = array_search($id, array_column($siswa, 'id'));

            //
            array_splice($siswa, $index , 1);

            session(['siswa_data'=> $siswa]);

            return redirect('siswa');
        }

    }
