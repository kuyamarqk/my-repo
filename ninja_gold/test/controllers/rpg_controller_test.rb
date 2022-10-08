require "test_helper"

class RpgControllerTest < ActionDispatch::IntegrationTest
  test "should get index" do
    get rpg_index_url
    assert_response :success
  end
end
