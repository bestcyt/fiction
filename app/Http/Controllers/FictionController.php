<?php

namespace App\Http\Controllers;

use App\Fiction;
use Illuminate\Http\Request;

class FictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $input = "utf-8编码时，如何正则匹配中文汉字？";
//        if (preg_match_all("/([\x{4e00}-\x{9fa5}]+)/u", $input, $match))
//        {
//            dd($match);
//            print("该字符串含有中文");
//        }
//        else {
//            dd('该字符串没有中文');
//            print("该字符串没有中文");
//        }


        $arr = [];
        $url = 'http://www.biqukan.com/17_17957/';
        $file = file_get_contents($url);
        $html = iconv("gb2312", "utf-8//IGNORE",$file);
        //<dd><a.*<\/dd>
        preg_match_all('/<dd><a.*<\/dd>/',$html,$ff);
        for ($i=0;$i<count($ff[0]);$i++){
            $youdd = $ff[0][$i];//"<dd><a href="/17_17957/17776109.html">第九百八十九章 比试用毒</a></dd>"
            $qudd = str_replace('<dd>','',$youdd);
            $qudd = str_replace('</dd>','',$qudd);//"<a href="/17_17957/17776109.html">第九百八十九章 比试用毒</a>"
            //匹配中文
            preg_match_all("/([\x{4e00}-\x{9fa5}]+)/u", $qudd, $hanzi);
            //匹配网址
            preg_match_all('/".*"/',$qudd,$href);
            $hrefs = str_replace('"','',$href[0][0]);
            $arr[$i]['href'] ='http://www.biqukan.com'.$hrefs;
            $arr[$i]['title'] = count($hanzi[0])>1 ? ($hanzi[0][0].'-'.$hanzi[0][1]) : $hanzi[0][0];
        }
        //先十篇试试
        for ($i=0;$i<count($arr);$i++){
            $href = $arr[$i]['href'];
            $title = $arr[$i]['title'];
//            preg_match_all('/第.*章/',$title,$zhon_id);
//            $zhon_id = str_replace('章','',str_replace('第','',$zhon_id[0][0]));
//            $len = mb_strlen($zhon_id, "UTF-8");
//            dd($zhon_id,$len);//九百八十九  5
            //切割中文字符串
//            for ($j=0;$j<$len;$j++){
//                $zhon[$j] = mb_substr($zhon_id,$j,1,'utf-8');
//            }
//            $article_id = $this->chrtonum($zhon_id);
            $cont_html = iconv("gb2312", "utf-8//IGNORE",file_get_contents($href));
            preg_match_all('/<div .*<\/div>/',$cont_html,$cont_html_dd);
            $content = $cont_html_dd[0][0];
//            $data[$i]['article_id'] = $article_id;
            $data[$i]['title'] = $title;
            $data[$i]['url'] = $href;
            $data[$i]['content'] = $content;
        }
        Fiction::insert($data);
        $list = Fiction::orderBy('article_id asc')->paginate(50);
        dd($list);
        return view('welcome');
    }

    public function list_article(){

        $list = Fiction::orderBy('id')->paginate(30);
        return view('welcome',['list'=>$list]);
    }

    private function chrtonum($str){
        $num=0;
        $bins=array("零","一","二","三","四","五","六","七","八","九",'a'=>"个",'b'=>"十",'c'=>"百",'d'=>"千",'e'=>"万");
        $bits=array('a'=>1,'b'=>10,'c'=>100,'d'=>1000,'e'=>10000);
        foreach($bins as $key=>$val){
            if(strpos(" ".$str,$val)) $str=str_replace($val,$key,$str);
        }
        foreach(str_split($str,2) as $val){
            $temp=str_split($val,1);
            if(count($temp)==1) $temp[1]="a";
            if(isset($bits[$temp[0]])){
                $num=$bits[$temp[0]]+(int)$temp[1];
            }else{
                $num+=(int)$temp[0]*$bits[$temp[1]];
            }
        }
        return $num;
    }

    public function art($id){

        $info = Fiction::find($id);
        return view('show',['info'=>$info]);
    }

    public function test(){
        dd($this->chrtonum('九百八十九'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
