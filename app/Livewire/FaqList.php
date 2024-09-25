<?php

namespace App\Livewire;

use Livewire\Component;

class FaqList extends Component
{
    public $faqs;

    public function mount()
    {
        $this->faqs = [
            ['id' => 1, 'question' => 'How does home exchange work?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, molestias nulla. Dolorum deleniti aut id ullam voluptatibus. Voluptate distinctio rerum fugiat explicabo quisquam ex similique error, pariatur modi voluptas.', 'isExpanded' => false],
            ['id' => 2, 'question' => 'How does home exchange work?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, molestias nulla. Dolorum deleniti aut id ullam voluptatibus. Voluptate distinctio rerum fugiat explicabo quisquam ex similique error, pariatur modi voluptas.', 'isExpanded' => false],
            ['id' => 3, 'question' => 'What are the benefits of home exchange?', 'answer' => 'Home exchange offers numerous benefits including cost savings on accommodation, authentic local experiences, and the opportunity to live like a local in various destinations around the world.', 'isExpanded' => false],
        ];
    }

    public function toggleFaq($id)
    {
        $index = array_search($id, array_column($this->faqs, 'id'));
        if ($index !== false) {
            $this->faqs[$index]['isExpanded'] = !$this->faqs[$index]['isExpanded'];
        }
    }

    public function render()
    {
        return view('livewire.faq-list');
    }
}
