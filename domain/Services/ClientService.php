<?php

namespace domain\Services;

use App\Models\Client;


class ClientService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->client->all();
    }


    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->client->find($id);
    }

    public function store($data)
    {
        $this->client->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'year' => $data['year'],
            'month' => $data['month'],
            'date' => $data['date'],
            'street_no' => $data['street_no'],
            'street_address' => $data['street_address'],
            'city' => $data['city'],
            'image_path' => $data['image_path'] ?? null,
        ]);
    }

    public function update($id, $data)
    {
        $this->get($id)->update($data);
    }

    public function destroy($id)
    {
        $this->get($id)->delete();
    }
}
