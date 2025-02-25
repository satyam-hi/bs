<?php

namespace App\Http\Controllers;

use App\Models\AlluserModel;
use App\Models\productModel;
use Illuminate\Http\Request;

class webConroller extends Controller
{

    public function index()
    {
        $products =  productModel::all();
        return view('webindex', compact('products'));
    }

    public function read(Request $req)
    {
        $user = AlluserModel::where('email', '=', session('userEmail'))->where('password', '=', session('userPassword'))->get()->first();
        $product =  productModel::where('id', '=', $req->id)->get()->first();
        if ($product->plan == 'free') {
            return view('read', compact('product'));
        } elseif (count(json_decode($user->items)) > 0) {
            $data =  json_decode($user->items);
            if (in_array($req->id, $data)) {
                return view('read', compact('product'));
            } else {
                $id = $req->id;
                return view('buy', compact('id'));
            }
        } else {
            $id = $req->id;
            return view('buy', compact('id'));
        }
    }

    public function buyAction(Request $req)
    {
        $user = AlluserModel::where('email', '=', session('userEmail'))->where('password', '=', session('userPassword'))->get()->first();
        $id =  $req->id;
        $itms = json_decode($user->items, true);
        array_push($itms, $id);
        $product =  AlluserModel::where('email', '=', session('userEmail'))->where('password', '=', session('userPassword'))->update(['items' => $itms]);
        $productGetS =  productModel::where('id', '=', $req->id)->get()->first();
        $productSell =  productModel::where('id', '=', $req->id)->update(['sellCount' => $productGetS->sellCount + 1]);
        return redirect('/web');
    }

    public function onBag(Request $req)
    {
        // return
        $user = AlluserModel::where('email', '=', session('userEmail'))->where('password', '=', session('userPassword'))->get()->first();
        $allItems  = json_decode($user->items);
        $allFullItems = [];
        foreach ($allItems as $itm) {
            $productGetS =  productModel::where('id', '=', $itm)->get()->first();
            $allFullItems[] = $productGetS;
        }
        return view('onBag', compact('allFullItems'));
    }

    public function testapi()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dropshopie13.myshopify.com/admin/api/2024-07/graphql.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"query":"mutation updateCustomerMetafields($input: CustomerInput!) {\\n  customerUpdate(input: $input) {\\n    customer {\\n      id\\n      metafields(first: 3) {\\n        edges {\\n          node {\\n            id\\n            namespace\\n            key\\n            value\\n          }\\n        }\\n      }\\n    }\\n    userErrors {\\n      message\\n      field\\n    }\\n  }\\n}","variables":{"input":{"metafields":[{"id":"gid://shopify/Metafield/41401612435744","value":"2000-08-11"}],"id":"gid://shopify/Customer/8320021627168"}}}',
            CURLOPT_HTTPHEADER => array(
                'X-Shopify-Access-Token: shpua_182118d3d65b1fee1ba7c9a9200a236f',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        // return "testapi";
    }
}
