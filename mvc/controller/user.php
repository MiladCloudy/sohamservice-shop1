<?
class UserController {

  public function __construct() {}

  public function toggleWishList($type, $id) {
    grantUser();

    $wish   = UserModel::fetch_wish(getUserId(), $type, $id);

    if ($wish != null && count($wish) > 0) {
      $this->removeFromWishList($type, $id);
      $isInWishList = 0;
    } else {
      $this->addToWishList($type, $id);
      $isInWishList = 1;
    }

    $data['isInWishList'] = $isInWishList;
    echo json_encode($data);
  }


  public function addToWishList($type, $id) {
    grantUser();
    UserModel::insert_wish(getUserId(), $type, $id);
  }


  public function removeFromWishList($type, $id) {
    grantUser();
    UserModel::remove_wish(getUserId(), $type, $id);
  }
}
?>