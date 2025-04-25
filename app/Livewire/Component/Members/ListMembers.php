<?php

namespace App\Livewire\Component\Members;

use Livewire\Component;
use App\Models\Member;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use App\Livewire\Forms\MemberForm;
use Livewire\Attributes\On;

class ListMembers extends Component
{
    use WithPagination;
    public $isMemberModalOpen = false;
    public MemberForm $memberForm;



    //Close update user modal

    protected $listeners = ['closeMembersModal' => 'handleCloseModal'];

    public function handleCloseModal()
    {
        $this->isMemberModalOpen = false;
    }
    //Open member modal
    public function openMemberModal($memberId = null)
    {
        if ($memberId) {
            $member = $this->getMemberById($memberId);
            if ($member) {
                $this->memberForm->id = $member->id;
                $this->memberForm->firstName = $member->firstName;
                $this->memberForm->lastName = $member->lastName;
                $this->memberForm->email = $member->email;
                $this->memberForm->phone = $member->phone;
            } else {
                session()->flash('alert', 'Member not found.');
                return;
            }
        } else {
            $this->memberForm->id = null;
            $this->memberForm->firstName = '';
            $this->memberForm->lastName = '';
            $this->memberForm->email = '';
            $this->memberForm->phone = '';
        }

        $this->isMemberModalOpen = true;
    }

    //Get all members with pagination
    #[Computed(persist: true)]
    public function fetchAllUsersWithPagination()
    {
        return ['members' => Member::latest()->paginate(5), 'count' => Member::count()];
    }


    //Get member by id
    public function getMemberById($id)
    {
        $member = Member::findOrFail($id);
        return $member;
    }

    // Delete a member
    public function deleteMember($id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->delete();
            session()->flash('memberMessage', 'Member deleted successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting member: ' . $e->getMessage());
        }
    }
    #[On('memberSaved')]
    public function refreshList($member= null){}

    public function render()
    {
        return view('livewire.component.members.list-members', [
            'members' => $this->fetchAllUsersWithPagination()['members'],
            'totalMembersCount' => $this->fetchAllUsersWithPagination()['count'],
        ]);
    }
}
