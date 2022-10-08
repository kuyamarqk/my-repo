Rails.application.routes.draw do
  post '/process/farm' => "rpg#farm"
  post '/process/cave' => "rpg#cave"
  post '/process/house' => "rpg#house"
  post '/process/casino' => "rpg#casino"
  root 'rpg#index'
  # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
end
