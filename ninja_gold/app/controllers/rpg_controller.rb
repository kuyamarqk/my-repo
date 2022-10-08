class RpgController < ApplicationController

  	@@activities = Array.new
	
	def index
		if session[:gold] == nil
			session[:gold] = params[:money]
			@@activities = []
		end
		@activities = @@activities
  	end

	def farm 
		gold = rand(10..20)
		msg = ["text_color_green","Earn #{gold} golds from the farm! (#{get_date})" ]
		display(gold, msg)
	end
	def cave 
		gold = rand(5..10)
		msg = ["text_color_green","Earn #{gold} golds from the cave! (#{get_date})" ]
		display(gold, msg)
	end
	def house 
		gold = rand(2..5)
		msg = ["text_color_green","Earn #{gold} golds from the house! (#{get_date})" ]
		display(gold, msg)
	end
	def casino 
		gold = rand(-50..50)
		if gold > 1
			msg = ["text_color_green","Earn #{gold} golds from the casino! (#{get_date})" ]
		else
			msg = ["text_color_red","Entered a casino and lost #{gold.abs} golds ... Ouch... (#{get_date})" ]
		end
		display(gold, msg)
	end

	def display (gold,msg)
		session[:gold] += gold
		@@activities.push(msg)
		redirect_to '/' 
	end

	def get_date
		return Time.now.strftime("%Y/%m/%d %I:%M %p")
	end
	
end
