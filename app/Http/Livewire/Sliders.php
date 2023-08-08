<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Slider;

class Sliders extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $img, $title, $text, $btn, $btntext;
    public $updateMode = false;

    public function index()
    {
        $sliders = Slider::all();
        return view('index', compact('sliders'));
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sliders.view', [
            'sliders' => Slider::latest()
						->orWhere('img', 'LIKE', $keyWord)
						->orWhere('title', 'LIKE', $keyWord)
						->orWhere('text', 'LIKE', $keyWord)
						->orWhere('btn', 'LIKE', $keyWord)
						->orWhere('btntext', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->img = null;
		$this->title = null;
		$this->text = null;
		$this->btn = null;
		$this->btntext = null;
    }

    public function store()
    {
        $this->validate([
		'img' => 'required',
		'title' => 'required',
		'text' => 'required',
		'btn' => 'required',
		'btntext' => 'required',
        ]);

        Slider::create([ 
			'img' => $this-> img,
			'title' => $this-> title,
			'text' => $this-> text,
			'btn' => $this-> btn,
			'btntext' => $this-> btntext
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Slider Successfully created.');
    }

    public function edit($id)
    {
        $record = Slider::findOrFail($id);

        $this->selected_id = $id; 
		$this->img = $record-> img;
		$this->title = $record-> title;
		$this->text = $record-> text;
		$this->btn = $record-> btn;
		$this->btntext = $record-> btntext;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'img' => 'required',
		'title' => 'required',
		'text' => 'required',
		'btn' => 'required',
		'btntext' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Slider::find($this->selected_id);
            $record->update([ 
			'img' => $this-> img,
			'title' => $this-> title,
			'text' => $this-> text,
			'btn' => $this-> btn,
			'btntext' => $this-> btntext
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Slider Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Slider::where('id', $id);
            $record->delete();
        }
    }
}
