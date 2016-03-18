<?php


    function get_sign($data)
    {
        $arr = array_values($data);
        $str = implode("", $arr)."injp_adways_key_150505";
        $data['sign'] = md5($str);
        return http_build_query($data);
    }
    
    function get_stores()
    {
        $url = "http://jpsaomagou.com/api/2.0/stores?app_id=867840020598034&channel=yingyongbao&lang=chs&system=android&token=0zbotsqyb4a46g79te756w97fj7lxuun&version=1.0.8&sign=acf912ce9c547d9b6c94a2a53f6463d3";
        $data = file_get_contents($url);
        return json_decode($data, true);
    }
     
    function get_items($i)
    {
        $data['app_id'] = "867840020598034";
        $data['category_id'] = $i;
        $data['channel'] = "yingyongbao";
        $data['lang'] = "chs";
        $data['system'] = "android";
        $data['token'] = "0zbotsqyb4a46g79te756w97fj7lxuun";
        $data['version'] = "1.0.8";
        $str = get_sign($data);
        $url = "http://jpsaomagou.com/api/2.0/commodity/hots/by_category?".$str;
        $data = file_get_contents($url);
        return json_decode($data, true);
    }

    function get_store_detail($store_id)
    {
        $data['app_id'] = "867840020598034";
        $data['channel'] = "yingyongbao";
        $data['lang'] = "chs";
        $data['store_id'] = $store_id;
        $data['system'] = "android";
        $data['token'] = "0zbotsqyb4a46g79te756w97fj7lxuun";
        $data['version'] = "1.0.8";
        $str = get_sign($data);
        $url = "http://jpsaomagou.com/api/2.0/store/detail?".$str;

        $data = file_get_contents($url);
        return json_decode($data, true);
    }

    function get_item_detail($item_id)
    {
        $data['app_id'] = "867840020598034";
        $data['channel'] = "yingyongbao";
        $data['code'] = $item_id;
        $data['lang'] = "chs";
        $data['location'] = "116.330569,40.060122";
        $data['source'] = "2";
        $data['system'] = "android";
        $data['token'] = "0zbotsqyb4a46g79te756w97fj7lxuun";
        $data['version'] = "1.0.8";
        $str = get_sign($data);
        $url = "http://jpsaomagou.com/api/2.0/commodity/get?".$str;
        $data = file_get_contents($url);
        return json_decode($data, true);
    }

/*
  public static String a(String paramString)
  {
    return "http://www.amazon.co.jp/s?field-keywords=" + paramString;
  }

  public static String a(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/hots?" + str;
  }

  public static String a(String paramString1, String paramString2, int paramInt1, int paramInt2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("keyword", paramString2);
    localTreeMap.put("start", paramInt1);
    localTreeMap.put("length", paramInt2);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString3);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/search?" + str;
  }

  public static String a(String paramString1, String paramString2, int paramInt, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("commodity_id", paramString2);
    localTreeMap.put("length", paramInt);
    localTreeMap.put("start", paramString3);
    return "http://jpsaomagou.com/api/2.0/evaluate?" + b(localTreeMap);
  }

  public static String a(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("store_id", paramString1);
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString2);
    localTreeMap.put("token", paramString3);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/store/detail?" + str;
  }

  public static String a(String paramString1, String paramString2, String paramString3, String paramString4)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("commodity_id", paramString1);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString2);
    localTreeMap.put("token", paramString3);
    localTreeMap.put("source", paramString4);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/collection?" + str;
  }

  public static String a(String paramString1, String paramString2, String paramString3, String paramString4, String paramString5)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("code", paramString1);
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("source", paramString2);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("location", paramString3);
    localTreeMap.put("lang", paramString4);
    localTreeMap.put("token", paramString5);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/get?" + str;
  }

  public static String a(String paramString1, String paramString2, String paramString3, String paramString4, String paramString5, String paramString6)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("commodity_id", paramString1);
    localTreeMap.put("source", paramString2);
    localTreeMap.put("price", paramString3);
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString4);
    localTreeMap.put("url", paramString5);
    localTreeMap.put("token", paramString6);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/price/update?" + str;
  }

  private static String a(SortedMap<String, String> paramSortedMap)
  {
    StringBuilder localStringBuilder1 = new StringBuilder();
    StringBuilder localStringBuilder2 = new StringBuilder();
    Iterator localIterator = paramSortedMap.keySet().iterator();
    if (!(localIterator.hasNext()))
    {
      localStringBuilder2.append("injp_adways_key_150505");
      return localStringBuilder1.toString() + "sign" + "=" + n(localStringBuilder2.toString());
    }
    String str = (String)localIterator.next();
    localStringBuilder1.append(str);
    localStringBuilder1.append("=");
    try
    {
      localStringBuilder1.append(URLEncoder.encode((String)paramSortedMap.get(str), "UTF-8"));
      label141: localStringBuilder1.append("&");
      localStringBuilder2.append((String)paramSortedMap.get(str));
    }
    catch (UnsupportedEncodingException localUnsupportedEncodingException)
    {
      break label141:
    }
  }

  public static String b(String paramString)
  {
    return "http://www.google.cn/maps/search/" + paramString;
  }

  public static String b(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/hots/more?" + str;
  }

  public static String b(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("category_id", paramString2);
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString3);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/hots/by_category?" + str;
  }

  public static String b(String paramString1, String paramString2, String paramString3, String paramString4)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("code", paramString2);
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("source", paramString3);
    localTreeMap.put("token", paramString4);
    return "http://jpsaomagou.com/api/2.0/commodity/storeCommodity?" + b(localTreeMap);
  }

  public static String b(String paramString1, String paramString2, String paramString3, String paramString4, String paramString5)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("code", paramString1);
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("contact_tag", paramString2);
    localTreeMap.put("location", paramString3);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString4);
    localTreeMap.put("token", paramString5);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/comment/submit?" + str;
  }

  private static String b(SortedMap<String, String> paramSortedMap)
  {
    StringBuilder localStringBuilder1 = new StringBuilder();
    StringBuilder localStringBuilder2 = new StringBuilder();
    Iterator localIterator = paramSortedMap.keySet().iterator();
    if (!(localIterator.hasNext()))
    {
      localStringBuilder2.append("injp_adways_key_150505");
      return localStringBuilder1.toString() + "sign" + "=" + n(localStringBuilder2.toString());
    }
    String str = (String)localIterator.next();
    localStringBuilder1.append(str);
    localStringBuilder1.append("=");
    try
    {
      localStringBuilder1.append(URLEncoder.encode((String)paramSortedMap.get(str), "UTF-8"));
      label141: localStringBuilder1.append("&");
    }
    catch (UnsupportedEncodingException localUnsupportedEncodingException)
    {
      break label141:
    }
  }

  public static String c(String paramString)
  {
    return "http://search.rakuten.co.jp/search/mall?s=5&f=1&st=A&nitem=&v=2&sf=0&sitem=" + paramString;
  }

  public static String c(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/stores?" + str;
  }

  public static String c(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("keyword", paramString2);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString3);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/search?" + str;
  }

  public static String c(String paramString1, String paramString2, String paramString3, String paramString4)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("commodity_id", paramString3);
    localTreeMap.put("source", paramString4);
    localTreeMap.put("token", paramString2);
    return "http://jpsaomagou.com/api/2.0/history/delete?" + a(localTreeMap);
  }

  public static String d(String paramString)
  {
    return "http://www.amazon.co.jp/gp/offer-listing/" + paramString + "/ref=dp_olp_new_mbc?ie=UTF8&condition=new";
  }

  public static String d(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/exchange_rate?" + str;
  }

  public static String d(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("commodity_id", paramString2);
    localTreeMap.put("reaction", paramString3);
    return "http://jpsaomagou.com/api/2.0/commodity/reaction?" + b(localTreeMap);
  }

  public static String e(String paramString)
  {
    return "http://www.amazon.co.jp/gp/product/" + paramString;
  }

  public static String e(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/exchange_rates?" + str;
  }

  public static String e(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("commodity_id", paramString2);
    localTreeMap.put("token", paramString3);
    return "http://jpsaomagou.com/api/2.0/evaluate/store?" + b(localTreeMap);
  }

  public static String f(String paramString)
  {
    return "http://www.matsukiyo.co.jp/store/p/" + paramString;
  }

  public static String f(String paramString1, String paramString2)
  {
    String str1 = Long.valueOf(System.currentTimeMillis() / 1000L).toString();
    String str2 = n("20151130000007049" + paramString1 + str1 + "IpmTz5S8OMRiJNf8Cgne");
    try
    {
      if (paramString2.equals("chs"))
        return "http://api.fanyi.baidu.com/api/trans/vip/translate?appid=20151130000007049&from=jp&to=zh&q=" + URLEncoder.encode(paramString1, "UTF-8") + "&salt=" + str1 + "&sign=" + str2;
      String str3 = "http://api.fanyi.baidu.com/api/trans/vip/translate?appid=20151130000007049&from=jp&to=cht&q=" + URLEncoder.encode(paramString1, "UTF-8") + "&salt=" + str1 + "&sign=" + str2;
      return str3;
    }
    catch (UnsupportedEncodingException localUnsupportedEncodingException)
    {
      localUnsupportedEncodingException.printStackTrace();
    }
    return "";
  }

  public static String f(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    localTreeMap.put("source", paramString3);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/delHistory?" + str;
  }

  public static String g(String paramString)
  {
    return paramString;
  }

  public static String g(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/feedback?" + str;
  }

  public static String g(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("appdata", paramString2);
    localTreeMap.put("token", paramString3);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/appData?" + str;
  }

  public static String h(String paramString)
  {
    return "http://search.shopping.yahoo.co.jp/search?ei=UTF-8&p=" + paramString + "&used=2&t_used=2";
  }

  public static String h(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/version/check?" + str;
  }

  public static String h(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("commodity_id", paramString3);
    localTreeMap.put("token", paramString2);
    return "http://jpsaomagou.com/api/2.0/commodity/storeTranslate?" + b(localTreeMap);
  }

  public static String i(String paramString)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString);
    return "http://jpsaomagou.com/api/2.0/user/login?" + b(localTreeMap);
  }

  public static String i(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/keyword/hots?" + str;
  }

  public static String i(String paramString1, String paramString2, String paramString3)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("commodity_id", paramString2);
    localTreeMap.put("source", paramString3);
    localTreeMap.put("token", paramString1);
    return "http://jpsaomagou.com/api/2.0/commodity/isCollection?" + a(localTreeMap);
  }

  public static String j(String paramString)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString);
    localTreeMap.put("platform", "phone");
    return "http://jpsaomagou.com/api/2.0/user/register?" + b(localTreeMap);
  }

  public static String j(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("evaluate_id", paramString2);
    return "http://jpsaomagou.com/api/2.0/evaluate/support?" + b(localTreeMap);
  }

  public static String k(String paramString)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString);
    return "http://jpsaomagou.com/api/2.0/user/getPhoneCode?" + b(localTreeMap);
  }

  public static String k(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    return "http://jpsaomagou.com/api/2.0/user/logout?" + a(localTreeMap);
  }

  public static String l(String paramString)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString);
    localTreeMap.put("for", "password");
    return "http://jpsaomagou.com/api/2.0/user/getPhoneCode?" + b(localTreeMap);
  }

  public static String l(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/collectionList?" + str;
  }

  public static String m(String paramString)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString);
    return "http://jpsaomagou.com/api/2.0/user/changePassword?" + b(localTreeMap);
  }

  public static String m(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/commodity/historyList?" + str;
  }

  private static String n(String paramString)
  {
    MessageDigest localMessageDigest1;
    MessageDigest localMessageDigest2;
    try
    {
      localMessageDigest2 = MessageDigest.getInstance("MD5");
      localMessageDigest1 = localMessageDigest2;
      StringBuilder localStringBuilder = new StringBuilder();
      localMessageDigest1.update(paramString.getBytes());
      byte[] arrayOfByte = localMessageDigest1.digest();
      int i = 0;
      if (i >= arrayOfByte.length)
        return localStringBuilder.toString();
      String str = Integer.toHexString(0xFF & arrayOfByte[i]);
      if (str.length() == 1)
        localStringBuilder.append("0");
      localStringBuilder.append(str);
      ++i;
    }
    catch (NoSuchAlgorithmException localNoSuchAlgorithmException)
    {
      while (true)
        localMessageDigest1 = null;
    }
  }

  public static String n(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    String str = a(localTreeMap);
    return "http://jpsaomagou.com/api/2.0/user/info?" + str;
  }

  public static String o(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    return "http://jpsaomagou.com/api/2.0/user/update?" + b(localTreeMap);
  }

  public static String p(String paramString1, String paramString2)
  {
    TreeMap localTreeMap = new TreeMap();
    localTreeMap.put("app_id", k.bG);
    localTreeMap.put("version", "1.1.0");
    localTreeMap.put("system", "android");
    localTreeMap.put("channel", "wandoujia");
    localTreeMap.put("lang", paramString1);
    localTreeMap.put("token", paramString2);
    return "http://jpsaomagou.com/api/2.0/user/updatePhone?" + b(localTreeMap);
  }
 */
