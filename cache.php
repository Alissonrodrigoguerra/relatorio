<?php
//<!-- CONEXÂO COM PLANILHA -->
class Cache extends Abstractfile {

    protected $folder;
    protected $timeout;
    protected $ext;

    public function __construct( $timeout = 60,$folder = 'cache', $ext = 'json'){
       $this->timeout = $timeout;
       $this->folder = $folder;
       $this->ext = $ext;

    }

    public function getPathFileName ($key){
        return sprintf('%s/%s/%s', $this->folder, md5($Key), $this->ext);
    }

    private function existe($filename){
        return file_exists($filename);
    }
    
    public function isCache($Key){
        $filename = $this->getPathFileName($key);
        if(!file_exists($filename)){
            return true;
        }
        $fileTime = filemtime($filename);
        if(time() > (filemtime + (60* $this->timeout)) ){
            return true;
        }else{
            return false;
        }
    } 

    // public function write($key, $value){
    //     $filename = getPathFileName($key);
    //     if(!file_put_contents($filename, $value)){
    //         throw new CacheExepiton('Esse arquivo foi possivel gravar um valor')
    //     }
    // }
    
  
    // $url = "https://api.sheety.co/8876e395947f5220b2f64fa5b0571b24/cópiaDeFormulárioDeAplicaçãoAcquateria [copyNomeDoFormulário]V2 (respostas)/respostasAoFormulário1";
    // $json = file_get_contents($url);
    // $shets = json_decode($json);
    
    // return $cacheshets;


}


//<!-- VERIFICA DATA DO DIA -->

//<!-- SE DATA FOR MAIOR QUE ULTIMA IMPORTAÇÂO ENTÂO IMPORTA -->

?>