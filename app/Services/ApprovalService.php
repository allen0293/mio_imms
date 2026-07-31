<?php 
class ApprovalService
{
    public function getNextApprover(
        string $module,
        int $departmentId,
        int $level
    )
    {
        return ApprovalMatrix::query()

            ->where('module',$module)

            ->where(function($query) use ($departmentId){

                $query

                    ->where('department_id',$departmentId)

                    ->orWhereNull('department_id');

            })

            ->where('approval_level',$level)

            ->where('is_active',true)

            ->first();
    }
}