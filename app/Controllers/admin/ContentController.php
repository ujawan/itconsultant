<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\ContentModel;

class ContentController extends BaseController
{
    public function __construct()
    {
        
        $this->contentModel = new ContentModel();
        $this->pager = \Config\Services::pager();
        $this->session = session();
    }



    public function content(){

        $page = ($this->request->getGet('page') ?? 1);
        $offset = ($page*100)-100;
        
        if ($this->request->getMethod()=='post') {
            $search = trim($this->request->getPost('search'));
            $like = [
                'route' => $search,
                'criteria' =>  $search
            ];
            $data = [
                'content' => $this->contentModel->like('route',$search)->orLike('criteria',$search)->orderBy('content_id','DESC')->paginate(100),
                'pager' => $this->contentModel->pager,
                'offset' => $offset
            ];
        

        }else{
            $data = [
                'content' => $this->contentModel->orderBy('content_id', 'DESC')->paginate(100),
                'pager' => $this->contentModel->pager,
                'offset' => $offset
            ];

        }


        /*foreach ($data['stock'] as $item) 
            {   
                $updated_item  = $item;
                $updated_item['featured_image'] = $this->get_thumb_link($item['featured_image']);
                $stock_data[] = $updated_item;
            }
            $data['stock'] = $stock_data;*/


        //echo "<pre>"; print_r($this->vehModel->getLastQuery()->getQuery()); exit;


    return view('admin/content',$data);
    
}





    public function create(){

        return view('admin/content-create');
    }




    public function store(){

        $data = array(
                    'route'=>trim($this->request->getPost('route')),                
                    'criteria'=>trim($this->request->getPost('criteria')),                 
                    'content'=>$this->request->getPost('content'),        
                    'meta_title'=>$this->request->getPost('meta_title'),        
                    'meta_description'=>$this->request->getPost('meta_description'),        
                    'meta_h1'=>$this->request->getPost('meta_h1'),        
                    'noindex'=>$this->request->getPost('noindex'),        
                    'visibility'=>$this->request->getPost('visibility'),                
                    'created_date'=>date("Y-m-d"),        
                    'added_by'=>$this->session->get('user_id') 
                );


        if ($this->contentModel->insert($data)) {

            $this->session->setTempdata('success','Success! Data inserted successfully');
            
        }else{

            $this->session->setTempdata('error','Failed! You have some problem');        
        }


        return redirect()->to(base_url('admin/content'));

    }




    public function edit($id){

        $data['edit'] = $this->contentModel->find($id);
        return view('admin/content-edit',$data);

    }




    public function update($id){

        $data = array(
                    'route'=>trim($this->request->getPost('route')),                
                    'criteria'=>trim($this->request->getPost('criteria')),                
                    'content'=>$this->request->getPost('content'),
                    'meta_title'=>$this->request->getPost('meta_title'),        
                    'meta_description'=>$this->request->getPost('meta_description'),        
                    'meta_h1'=>$this->request->getPost('meta_h1'),
                    'noindex'=>$this->request->getPost('noindex'),         
                    'visibility'=>$this->request->getPost('visibility'),                
                    'updated_date'=>date("Y-m-d"),        
                    'updated_by'=>$this->session->get('user_id') 
                );


        if($this->contentModel->update($id,$data)){

            $this->session->setTempdata('success','Success! Data updated successfully');
    
        }else{

            $this->session->setTempdata('error','Failed! You have some problem');
            
        }

        return redirect()->to(base_url('admin/content'));
        
    }




    public function delete($id){


        if($this->contentModel->delete($id)){

            $this->session->setTempdata('success','Success! Data successfully deleted',5);

        }else{

            $this->session->setTempdata('error','Failed! You have some problem',5);
            
        }

        return redirect()->to('admin/content');

    }


    

    
}
