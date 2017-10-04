class Luhn
  def self.checksum(number)
    digits = number.to_s.reverse.scan(/\d/).map { |x| x.to_i }
    digits = digits.each_with_index.map { |d, i|
      d *= 2 if i.even?
      d > 9 ? d - 9 : d
    }
    sum = digits.inject(0) { |m, x| m + x }
    mod = 10 - sum % 10
    mod==10 ? 0 : mod
  end
end

# Luhn.checksum(123)  # => 0
# Luhn.checksum(456)  # => 4