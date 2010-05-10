<?php

/**
 * User form.
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
           parent::configure();
      $guarduser = $this->getGuardUser();
      $sfguarduserForm = new sfGuardUserForm($guarduser);
      unset($this['id'],$this['sf_guard_user_id'], $this['user_type'],
                $this['token']);
      unset($sfguarduserForm['salt'], $sfguarduserForm['algorithm'], $sfguarduserForm['is_active'],
                $sfguarduserForm['is_super_admin'], $sfguarduserForm['last_login'],
                $sfguarduserForm['created_at'], $sfguarduserForm['updated_at'],
                $sfguarduserForm['groups_list'], $sfguarduserForm['permissions_list']);
      $this->embedForm('GuardUser', $sfguarduserForm);

  }
    # Save the Transporter and the underlying sfGuardUser.
  public function save($con = null)
  {
      $this->updatesfGuardUser();
      parent::save();
      return $this->object;
  }

  # Update the sfGuardUser and place it in the Transporter.GuardUser.
  public function updatesfGuarduser()
  {
      //update sfGuardUser
      if (!is_null ($guarduser = $this->getGuardUser()))
      {
          $values = $this->getValues();
          $guarduser->fromArray($values);

          if ($guarduser->isNew())
          {
              $this->getObject()->setGuardUser($guarduser);
          }
      }
  }
  # Get the sfGuardUser from the Transporter, if not exists create a new object.
  public function getGuardUser()
  {
      if (! $this->getObject()->getGuardUser())
      {
          return new GuardUser();
      } else {
          return $this->getObject()->getGuardUser();
      }

  }

}
