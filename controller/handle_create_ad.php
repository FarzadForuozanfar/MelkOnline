<?php
$db = new mysqli("localhost","root","123456","melkonline");
/**
 * @return array
 */
function addNewAd2database($data)
{
    global $db;
    $error = [];
    $sql = '';
    if ($data['ad_type'] == 1) {
        $sql = "INSERT INTO houses (user_id, title, price, price_per_meter, description, ad_type_id, category_id, address, meterage, region_id, floors, floor, bedrooms, year_construction, call_number) VALUES ({$_SESSION['user-login']['id']}, '{$data['title']}', '{$data['price']}', '{$data['price_per_meter']}', '{$data['description']}', '{$data['ad_type']}', '{$data['category']}', '{$data['address']}', '{$data['meterage']}', '{$data['region']}', '{$data['floors']}', '{$data['floor']}', '{$data['bedrooms']}', '{$data['year']}', '{$data['call_number']}')";
        $db->query($sql);
        
    } elseif ($data['ad_type'] == 2) {
        $db->query("INSERT INTO houses (user_id, title, rent, mortgage, price_per_meter, description, ad_type_id, category_id, address, meterage, region_id, floors, floor, bedrooms, year_construction, call_number) VALUES ({$_SESSION['user-login']['id']}, '{$data['title']}', '{$data['rent']}', '{$data['mortgage1']}', '{$data['price_per_meter']}', '{$data['description']}', '{$data['ad_type']}', '{$data['category']}', '{$data['address']}', '{$data['meterage']}', '{$data['region']}', '{$data['floors']}', '{$data['floor']}', '{$data['bedrooms']}', '{$data['year']}', '{$data['call_number']}')");

    } elseif ($data['ad_type'] == 3) {
        $db->query("INSERT INTO houses (user_id, title, mortgage, price_per_meter, description, ad_type_id, category_id, address, meterage, region_id, floors, floor, bedrooms, year_construction, call_number) VALUES ({$_SESSION['user-login']['id']}, '{$data['title']}', '{$data['mortgage2']}', '{$data['price_per_meter']}', '{$data['description']}', '{$data['ad_type']}', '{$data['category']}', '{$data['address']}', '{$data['meterage']}', '{$data['region']}', '{$data['floors']}', '{$data['floor']}', '{$data['bedrooms']}', '{$data['year']}', '{$data['call_number']}')");

    } else
        return ['statue' => 'error', 'msg' => $error];

    if (!empty($db->error)) {
        $error['error_database'] = $db->error;
        die(json_encode([$db, $error], JSON_FORCE_OBJECT ));
    } else {
        $id = $db->query("SELECT id FROM houses ORDER BY id DESC LIMIT 1;")->fetch_assoc();
        $id = $id['id'];
        $options = $data['option'];
        $db->query("UPDATE houses SET options = '$options' WHERE id = $id");
    }

    if (isset($data['images']) and !empty(count($data['images']))) {
        $id = $db->query("SELECT id FROM houses ORDER BY id DESC LIMIT 1;")->fetch_assoc();
        $id = $id['id'];
        $cnt = count($data['images']);
        $time = date('Y-m-d H:i:s');
        $time = str_replace(':', '-', $time);
        
        $pathes = [];
        foreach ($data['images']['name'] as $i => $name) {
            $time .= $i;
            $pathes[] = "view/assets/images/houses/" . $time . "_" . $name;
        }
        foreach ($pathes as $path) {
            $db->query("INSERT INTO `house_images` (`url`, `house_id`) VALUES('$path' , '$id'); ");
        }
        if (!empty($db->error)) {
            $error['image'] = $db->error;
        } else {
            foreach ($data['images']['tmp_name'] as $key => $path) {
                move_uploaded_file($path, $pathes[$key]);
            }
            
            $_SESSION['create-status'] = "success";
        }
    }
    return ['status' => 'success', 'error' => (isset($error) ? $error : ''), 'sql' => $sql];
}
if (isset($_POST)) {
    $error = null;
    $data = null;
    $error = [];
    $data = [];

    $data['category'] = $_POST['category'];
    if (isset($_POST['title'])) {
        $data['title'] = $_POST['title'];
        if (isset($_POST['meterage'])) {
            $data['meterage'] = $_POST['meterage'];
            if (isset($_POST['price_per_meter'])) {
                $data['price_per_meter'] = $_POST['price_per_meter'];
                if (isset($_POST['ad_type'])) {
                    $data['ad_type'] = $_POST['ad_type'];
                    if ($data['ad_type'] == 1) {
                        if (isset($_POST['price'])) {
                            $data['price'] = $_POST['price'];
                        } else {
                            $error['price'] = 'فیلد قیمت کل الزامی است لطفا آن را پر کنید ';
                        }
                    } elseif ($data['ad_type'] == 2) {
                        if (isset($_POST['rent']) and isset($_POST['mortgage1'])) {
                            $data['rent'] = $_POST['rent'];
                            $data['mortgage1'] = $_POST['mortgage1'];
                        } else {
                            $error['rent_mortgage'] = 'فیلد رهن و اجاره الزامی است لطفا آن را پر کنید ';
                        }
                    } elseif ($data['ad_type'] == 3) {
                        if (isset($_POST['mortgage2'])) {
                            $data['mortgage2'] = $_POST['mortgage2'];
                        } else {
                            $error['mortgage'] = 'فیلد رهن الزامی است لطفا آن را پر کنید ';
                        }
                    } else {
                        $error['ad_type'] = '';  
                    }
                    if (isset($_POST['option'])) {
                        $data['option'] = implode(',', $_POST['option']);
                    }
                    if (isset($_POST['region'])) {
                        $data['region'] = $_POST['region'];
                        if (isset($_POST['floors'])) {
                            $data['floors'] = $_POST['floors'];
                            if (isset($_POST['floor'])) {
                                $data['floor'] = $_POST['floor'];
                                if (isset($_POST['year'])) {
                                    $data['year'] = $_POST['year'];
                                    if (isset($_POST['bedrooms'])) {
                                        $data['bedrooms'] = $_POST['bedrooms'];
                                        if (isset($_POST['call_number'])) {
                                            $data['call_number'] = $_POST['call_number'];
                                            if (isset($_POST['description'])) {
                                                $data['description'] = $_POST['description'];
                                                if (isset($_POST['address'])) {
                                                    $data['address'] = $_POST['address'];
                                                    if (isset($_FILES['images']))
                                                        $data['images'] = $_FILES['images'];

                                                } else {
                                                    $error['address'] = 'فیلد آدرس الزامی است  لطفا آن را پر کنید';
                                                }
                                            } else {
                                                $error['description'] = 'فیلد توضیحات الزامی است آن را پر کنید ';
                                            }
                                        } else {
                                            $error['call_number'] = 'فیلد تلفن تماس الزامی است  آن را پر کنید ';
                                        }
                                    } else {
                                        $error['bedrooms'] = 'فیلد اتاق ها الزامی است آن را پر کنید ';
                                    }
                                } else {
                                    $error['year'] = 'فیلد سال ساخت الزامی است لطفا آن را پر کنید';
                                }
                            } else {
                                $error['floor'] = 'فیلد طبقه الزامی است آن را پر کنید ';
                            }
                        } else {
                            $error['floors'] = 'فیلد طبقات الزامی است لطفا آن را پر کنید ';
                        }
                    } else {
                        $error['region'] = 'فیلد منطقه الزامی است لطفا  آن را پر کنید ';
                    }
                } else {
                    $error['ad_type'] = 'نوع آگهی الزامی است لطفا آن را پر کنید';
                }
            } else {
                $error['price_per_meter'] = 'فیلد قیمت هر متر الزامی است آن را پر کنید ';
            }
        } else {
            $error['meterage'] = 'فیلد میتراژ الزامی است لطفا آن را پر کنید ';
        }
    } else
        $error['title'] = 'عنوان آگهی فیلد الزامی است لطفا آن را پر کنید ';
}
if (empty($error)) {
    $response = addNewAd2database($data);
    if ($response['status'] == 'success') {
        $status = ['status' => "response is true"];
        echo json_encode($status, true);
    } else {
        $status = ['status' => "error in line 245"];
        echo json_encode($status, true);
    }
} elseif (isset($error)) {
    echo json_encode($error, true);
} else {
    $status = ['status' => "error in line 254"];
    echo json_encode($status, true);
}
