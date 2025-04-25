<?php

namespace App\Livewire\Component\Members;

use Livewire\Component;
use App\Livewire\Forms\MemberForm;
use App\Models\Member;

class FormMembers extends Component
{
    public MemberForm $memberForm;

    // Function to handle create/update based on the presence of ID
    public function saveMember()
    {
        try {
            $this->validate();

            if ($this->memberForm->id) {
                // Update existing member
                $member = Member::find($this->memberForm->id);

                if ($member) {
                    $member->update([
                        'firstName' => $this->memberForm->firstName,
                        'lastName' => $this->memberForm->lastName,
                        'email' => $this->memberForm->email,
                        'phone' => $this->memberForm->phone,
                    ]);
                }
                session()->flash('memberMessage', 'Member saved successfully!');
            } else {
                //TO FIX
                // Create new member
                Member::create([
                    'firstName' => $this->memberForm->firstName,
                    'lastName' => $this->memberForm->lastName,
                    'email' => $this->memberForm->email,
                    'phone' => $this->memberForm->phone,
                ]);
                session()->flash('memberMessage', 'Member created successfully!');
            }
            $this->dispatch('memberSaved', $this->memberForm);
            $this->closeModal();
            $this->reset(['memberForm']);
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong! Please try again.');
        }
    }

    public function closeModal()
    {
        $this->dispatch('closeMembersModal');
    }
    public function render()
    {
        return view('livewire.component.members.form-members');
    }
}