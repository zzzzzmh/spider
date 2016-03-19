<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        echo "hello world";
    }

    public function get_stores()
    {
        $data = get_stores();
        //print_r($data);
        $model = D('Stores');
        // //print_r($model);
        // //exit;
        // //$ret = $model->where("id=20")->find();
        // $ret = $model->query("select * from jp_stores");
        // print_r($ret);
        // //print_r($ret);
        // exit;

        if ($data['status'] == 0) {
            foreach ($data['result'] as $value) {
                foreach ($value['stores'] as $val) {
                    //print_r($val);
                    $sql = "insert into jp_stores set id='".$val['store_id']."', name='".$val['name']."',
                    category_id='".$value['category_id']."',
                    icon='".$val['icon']."',
        			keyword='".$val['keyword']."',has_pm='".$val['has_pm']."',description='".addslashes($val['description'])."'";
                    echo $sql."\n";
                    $model->execute($sql);
                    print_r($model->getDbError());
                    //
                }
            }
        }
    }

    public function get_items()
    {
        $model = D('Stores');
        $tagsModel = D('Tags');
        for ($i=1;$i<=7;$i++) {
            $data = get_items($i);
            if ($data['status'] == 0) {
                foreach ($data['result'] as $value) {
                    $sql = "insert into jp_commodity set id='".$value['commodity_id']."',commodity_code='".$value['commodity_code']."',
                    category_id='".$i."',name='".$value['name']."',icon_url='".$value['icon_url']."',source='".$value['source']."',
                    price='".$value['price']."',prive_rmb='".($value['prive_rmb']?$value['prive_rmb']:"0")."'";
                    $model->execute($sql);
                    foreach ($value['commodity_tag'] as $val) {
                        $row = $tagsModel->where("id='".$val['tag_id']."'")->find();
                        if (empty($row)) {
                            $sql = "insert into jp_tags set id='".$val['tag_id']."',name='".$val['name']."',category='".$val['category']."'";
                            $model->execute($sql);
                        }
                        $sql = "insert into jp_commodity_tags set commodity_id='".$value['commodity_id']."', tag_id='".$val['tag_id']."'";
                        $model->execute($sql);
                    }
                }
            }
        }
    }

    public function get_store_detail()
    {
        $model = D('Stores');
        $res = $model->select();
        foreach ($res as $value) {
            $data = get_store_detail($value['id']);
            if ($data['status'] == 0) {
                if ($data['result'][0]['image1']) {
                    $sql = "insert into jp_images set store_id='".$value['id']."',path='".$data['result'][0]['image1']."'";
                    $model->execute($sql);
                }
                if ($data['result'][0]['image2']) {
                    $sql = "insert into jp_images set store_id='".$value['id']."',path='".$data['result'][0]['image2']."'";
                    $model->execute($sql);
                }
                if ($data['result'][0]['image3']) {
                    $sql = "insert into jp_images set store_id='".$value['id']."',path='".$data['result'][0]['image3']."'";
                    $model->execute($sql);
                }
                if ($data['result'][0]['image4']) {
                    $sql = "insert into jp_images set store_id='".$value['id']."',path='".$data['result'][0]['image4']."'";
                    $model->execute($sql);
                }
                $sql = "update jp_stores set name_jp='".$data['result'][0]['name']."',keyword='".$data['result'][0]['keyword']."',
                introduction='".addslashes($data['result'][0]['introduction'])."',
                has_pm='".addslashes($data['result'][0]['has_pm'])."',
                pm_url='".addslashes($data['result'][0]['pm_url'])."',
                pm_share_title='".addslashes($data['result'][0]['pm_share_title'])."',
                pm_share_content='".addslashes($data['result'][0]['pm_share_content'])."',
                pm_share_url='".addslashes($data['result'][0]['pm_share_url'])."' where id='".$value['id']."'
                ";
                $model->execute($sql);
            }
            usleep(100);
        }
    }


    public function get_item_detail()
    {
        $model = D('Commodity');
        $storeModel = D('Stores');
        $sourcesModel = D('Sources');
        $res = $model->field('id,commodity_code')->select();
        foreach ($res as $value) {
            $data = get_item_detail($value['commodity_code']);
            if ($data['status'] == 0) {
                foreach ($data['result']['images'] as $val) {
                    $sql = "insert into jp_images set commodity_id='".$value['id']."',path='".$val."'";
                    $model->execute($sql);
                }

                foreach ($data['result']['related_stores'] as $val) {
                    $store = $storeModel->where("id='".$val['store_id']."'")->find();
                    if (!empty($store)) {
                        // $sql = "update jp_stores set logo='".$val['logo']."',round_icon='".$val['round_icon']."'";
                        // $storeModel->execute($sql);
                    } else {
                        $sql = "insert into jp_stores set id='".$val['store_id']."',logo='".$val['logo']."',
                        round_icon='".$val['round_icon']."'";
                        $storeModel->execute($sql);
                    }
                    $sql = "insert into jp_stores_commodity set commodity_id='".$value['id']."',store_id='".$val['store_id']."'";
                    $storeModel->execute($sql);
                }

                foreach ($data['result']['source_prices'] as $val) {
                    $source = $sourcesModel->where("id='".$val['source']."'")->find();
                    if (!empty($source)) {
                    } else {
                        $sql = "insert into jp_sources set id='".$val['source']."',source_name='".$val['source_name']."',
                        source_icon='".$val['source_icon']."',type='".$val['type']."',is_old='".$val['is_old']."'";
                        $sourcesModel->execute($sql);
                    }
                    $sql = "insert into jp_source_price set commodity_id='".$value['id']."', source_id='".$val['source']."',
                    price='".$val['price']."',url='".$val['url']."'
                    ";
                    $sourcesModel->execute($sql);
                }
                $sql = "update jp_commodity set price_tb='".($data['result']['price_tb']?$data['result']['price_tb']:0)."',
                currency_rate='".$data['result']['currency_rate']."',
                description='".addslashes($data['result']['description'])."',
                baidu_name='".addslashes($data['result']['baidu_name'])."',
                baidu_description='".addslashes($data['result']['baidu_description'])."',
                reason='".addslashes($data['result']['reason'])."' where id='".$value['id']."'
                ";
                $model->execute($sql);
            }
            usleep(100);
        }
    }


    public function get_images()
    {
    }
}
