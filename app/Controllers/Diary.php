<?php

namespace App\Controllers;

use App\Models\EntryModel;

class Diary extends BaseController
{
    protected $entryModel;
    protected $session;

    public function __construct()
    {
        $this->entryModel = new EntryModel();
        $this->session = session();
    }

    private function requireLogin()
    {
        if (!$this->session->get('user_id')) {
            return redirect()->to('/login')->send();
        }
    }

    public function index()
    {
        $this->requireLogin();

        $userId = $this->session->get('user_id');
        $month = $this->request->getGet('month');
        $year = $this->request->getGet('year');

        $query = $this->entryModel->where('user_id', $userId);

        if ($month && $year) {
            $query->where('MONTH(date)', $month)->where('YEAR(date)', $year);
        }

        $entries = $query->orderBy('date', 'DESC')->findAll();

        return view('diary/index', ['entries' => $entries]);
    }

    public function create()
    {
        $this->requireLogin();
        return view('diary/create');
    }

    public function store()
    {
        $this->requireLogin();

        $data = [
            'user_id' => $this->session->get('user_id'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'date' => $this->request->getPost('date'),
            'mood' => $this->request->getPost('mood')
        ];

        $this->entryModel->insert($data);

        return redirect()->to('/');
    }

    public function show($id)
    {
        $this->requireLogin();

        $entry = $this->entryModel->where('id', $id)
                                  ->where('user_id', $this->session->get('user_id'))
                                  ->first();

        if (!$entry) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('diary/show', ['entry' => $entry]);
    }

    public function edit($id)
    {
        $this->requireLogin();

        $entry = $this->entryModel->where('id', $id)
                                  ->where('user_id', $this->session->get('user_id'))
                                  ->first();

        if (!$entry) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('diary/edit', ['entry' => $entry]);
    }

    public function update($id)
    {
        $this->requireLogin();

        $entry = $this->entryModel->where('id', $id)
                                  ->where('user_id', $this->session->get('user_id'))
                                  ->first();

        if (!$entry) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'date' => $this->request->getPost('date'),
            'mood' => $this->request->getPost('mood')
        ];

        $this->entryModel->update($id, $data);

        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->requireLogin();

        $entry = $this->entryModel->where('id', $id)
                                  ->where('user_id', $this->session->get('user_id'))
                                  ->first();

        if (!$entry) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->entryModel->delete($id);

        return redirect()->to('/');
    }
}
